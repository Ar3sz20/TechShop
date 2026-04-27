using Newtonsoft.Json;
using System.Globalization;
using System.Net;
using System.Security.AccessControl;
using System.Text;
using System.Text.Json;
using static System.Net.WebRequestMethods;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;
using File = System.IO.File;
using System.Net.Http;
using JsonSerializer = Newtonsoft.Json.JsonSerializer;


namespace APIWinform
{
    public partial class Form1 : Form
    {
        private HttpClient client = new HttpClient();
        private HttpClientHandler handler;

        private List<Product> allProducts = new List<Product>();
        private List<Product> trashedProducts = new List<Product>();
        public class ProductUploadDto
        {
            public string name { get; set; }
            public decimal price { get; set; }
            public string description { get; set; }
            public int quantity { get; set; }
            public string category { get; set; }
            public string brandname { get; set; }
            public string type { get; set; }
        }
        public class OrderItem
        {
            public int id { get; set; }
            public int quantity { get; set; }
        }

        private List<OrderItem> currentItems = new List<OrderItem>();

        public class OrderResponse
        {
            public List<Order> orders { get; set; }
        }

        bool isEditMode = false;

        public Form1()
        {
            InitializeComponent();
            handler = new HttpClientHandler
            {
                CookieContainer = new CookieContainer(),
                ServerCertificateCustomValidationCallback = (message, cert, chain, errors) => true
            };

            client = new HttpClient(handler);

            LoadAllProduct();

            RESTORE.Visible = false;
            DELETE.Visible = false;
            OrderDelete.Visible = false;
            CategorySelect.SelectedIndex = 0;
        }

        public class ApiResponse
        {
            public List<Product>? products { get; set; }
        }

        private async Task LoadAllProduct()
        {
            string url = "http://127.0.0.1:8000/api/products";

            try
            {
                HttpResponseMessage response = await client.GetAsync(url);

                if (response.IsSuccessStatusCode)
                {
                    string json = await response.Content.ReadAsStringAsync();

                    var result = JsonConvert.DeserializeObject<ApiResponse>(json);
                    var products = result?.products;

                    if (products == null)
                    {
                        MessageBox.Show("Hibás JSON!");
                        return;
                    }

                    allProducts = products;

                    Response.DataSource = allProducts;
                }
                else
                {
                    MessageBox.Show($"Status code: {response.StatusCode}");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Hiba: {ex.Message}");
            }
        }

        private async void call_Click(object sender, EventArgs e)
        {
            LoadAllProduct();

            RESTORE.Visible = false;
            DELETE.Visible = false;
            OrderDelete.Visible = false;
        }

        private void Filter_Click(object sender, EventArgs e)
        {

            if (allProducts == null)
            {
                MessageBox.Show("Nincs betöltött adat!");
                return;
            }

            string filter = CategoryFilter.Text;

            var filtered = allProducts
                .Where(p => p.category != null &&
                            p.category.Contains(filter, StringComparison.OrdinalIgnoreCase))
                .ToList();

            Response.DataSource = null;
            Response.DataSource = filtered;

        }
        string filepath = string.Empty;
        private void ImageAdd_Click(object sender, EventArgs e)
        {
            OpenFileDialog ofd = new OpenFileDialog();

            ofd.Filter = "Képek|*.jpg;*.jpeg;*.png;*.bmp;*.gif";

            if (ofd.ShowDialog() == DialogResult.OK)
            {
                filepath = ofd.FileName;
            }
        }

        private async void Add_Click(object sender, EventArgs e)
        {
            if (isEditMode)
            {
                try
                {
                    using var client = new HttpClient();
                    using var content = new MultipartFormDataContent();

                    content.Add(new StringContent(NameTB.Text), "name");
                    content.Add(new StringContent(PriceNud.Value.ToString(System.Globalization.CultureInfo.InvariantCulture)), "price");
                    content.Add(new StringContent(DescriptionTB.Text), "description");
                    content.Add(new StringContent(QuantityNud.Value.ToString()), "quantity");
                    content.Add(new StringContent(CategorySelect.Text), "category");
                    content.Add(new StringContent(BrandNameTB.Text), "brandname");
                    content.Add(new StringContent(TypeTB.Text), "type");

                    if (!string.IsNullOrEmpty(filepath) && File.Exists(filepath))
                    {
                        var fileBytes = File.ReadAllBytes(filepath);
                        var fileContent = new ByteArrayContent(fileBytes);

                        fileContent.Headers.ContentType =
                            new System.Net.Http.Headers.MediaTypeHeaderValue("image/jpeg");

                        content.Add(fileContent, "image", Path.GetFileName(filepath));
                    }

                    int id = Convert.ToInt32(
                        Response.SelectedRows[0].Cells["id"].Value
                    );

                    content.Add(new StringContent("PUT"), "_method");

                    var response = await client.PostAsync(
                        $"http://localhost:8000/api/products/{id}",
                        content
                    );
                    LoadAllProduct();
                }
                catch (Exception ex)
                {
                    MessageBox.Show("HIBA:\n" + ex.ToString());
                }
            }
            else
            {
                try
                {
                    using var client = new HttpClient();
                    using var content = new MultipartFormDataContent();

                    content.Add(new StringContent(NameTB.Text), "name");
                    content.Add(new StringContent(PriceNud.Value.ToString(System.Globalization.CultureInfo.InvariantCulture)), "price");
                    content.Add(new StringContent(DescriptionTB.Text), "description");
                    content.Add(new StringContent(QuantityNud.Value.ToString()), "quantity");
                    content.Add(new StringContent(CategorySelect.Text), "category");
                    content.Add(new StringContent(BrandNameTB.Text), "brandname");
                    content.Add(new StringContent(TypeTB.Text), "type");

                    if (!string.IsNullOrEmpty(filepath) && File.Exists(filepath))
                    {
                        var fileBytes = File.ReadAllBytes(filepath);
                        var fileContent = new ByteArrayContent(fileBytes);

                        fileContent.Headers.ContentType =
                            new System.Net.Http.Headers.MediaTypeHeaderValue("image/jpeg");

                        content.Add(fileContent, "image", Path.GetFileName(filepath));
                    }

                    var response = await client.PostAsync("http://localhost:8000/api/products/store", content);
                    NameTB.Clear();
                    PriceNud.Value = 0;
                    DescriptionTB.Clear();
                    QuantityNud.Value = 0;
                    CategorySelect.SelectedIndex = 0;
                    BrandNameTB.Clear();
                    TypeTB.Clear();
                    LoadAllProduct();
                }

                catch (Exception ex)
                {
                    MessageBox.Show("HIBA:\n" + ex.ToString());
                }
            }
        }

        private async void AllTrashed_Click(object sender, EventArgs e)
        {
            LoadTrashedProducts();

            RESTORE.Visible = true;
            DELETE.Visible = true;
        }

        private async Task LoadTrashedProducts()
        {
            string url = "http://127.0.0.1:8000/api/products/trashed";

            try
            {
                HttpResponseMessage response = await client.GetAsync(url);

                if (response.IsSuccessStatusCode)
                {
                    string json = await response.Content.ReadAsStringAsync();

                    var result = JsonConvert.DeserializeObject<ApiResponse>(json);
                    var products = result?.products;

                    if (products == null)
                    {
                        MessageBox.Show("Hibás JSON!");
                        return;
                    }

                    trashedProducts = products;

                    Response.DataSource = trashedProducts;
                }
                else
                {
                    MessageBox.Show($"Status code: {response.StatusCode}");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Hiba: {ex.Message}");
            }
        }

        private async void RESTORE_Click(object sender, EventArgs e)
        {
            if (Response.SelectedRows.Count > 0)
            {
                int id = Convert.ToInt32(Response.SelectedRows[0].Cells[0].Value);

                var client = new HttpClient();

                var response = await client.PostAsync($"http://localhost:8000/api/products/{id}/restore", new StringContent(id.ToString(), Encoding.UTF8, "application/json"));

                if (response.IsSuccessStatusCode)
                {
                    MessageBox.Show($"Termék visszaállítva: {id}");

                    await LoadTrashedProducts();

                    Response.Refresh();
                }
            }
        }

        private void DELETE_Click(object sender, EventArgs e)
        {
            if (Response.SelectedRows.Count > 0)
            {
                int id = Convert.ToInt32(Response.SelectedRows[0].Cells[0].Value);
                var client = new HttpClient();
                var response = client.DeleteAsync($"http://localhost:8000/api/products/{id}/force").Result;

                if (response.IsSuccessStatusCode)
                {
                    MessageBox.Show($"Termék véglegesen törölve: {id}");
                }
                else
                {
                    MessageBox.Show($"Hiba történt a törlés során: {response.StatusCode}");
                }
                LoadTrashedProducts();
            }
        }

        private void SoftDelete_Click(object sender, EventArgs e)
        {
            if (Response.SelectedRows.Count > 0)
            {
                int id = Convert.ToInt32(Response.SelectedRows[0].Cells[0].Value);
                var client = new HttpClient();
                var response = client.DeleteAsync($"http://localhost:8000/api/products/{id}").Result;

                if (response.IsSuccessStatusCode)
                {
                    MessageBox.Show($"Termék törölve: {id}");
                }
                else
                {
                    MessageBox.Show($"Hiba történt a törlés során: {response.StatusCode}");
                }
                LoadAllProduct();
            }
        }

        private List<ProductUploadDto> ParseTxt(string path)
        {
            var lines = File.ReadAllLines(path);
            var products = new List<ProductUploadDto>();

            foreach (var line in lines.Skip(1))
            {
                var cols = line.Split(';');

                if (cols.Length < 7)
                    continue;

                products.Add(new ProductUploadDto
                {
                    name = cols[0],
                    price = decimal.Parse(cols[1], CultureInfo.InvariantCulture),
                    description = cols[2],
                    quantity = int.Parse(cols[3]),
                    category = cols[4],
                    brandname = cols[5],
                    type = cols[6]
                });
            }

            return products;
        }

        private async Task UploadProducts(List<ProductUploadDto> products)
        {
            var json = JsonConvert.SerializeObject(products);

            var content = new StringContent(json, Encoding.UTF8, "application/json");

            var response = await client.PostAsync("http://localhost:8000/api/products/bulk", content);

            if (!response.IsSuccessStatusCode)
            {
                var error = await response.Content.ReadAsStringAsync();
                MessageBox.Show(error);
            }
        }

        private async void Uploade_Click(object sender, EventArgs e)
        {
            using OpenFileDialog ofd = new OpenFileDialog();

            ofd.Filter = "Text files (*.txt)|*.txt";

            if (ofd.ShowDialog() == DialogResult.OK)
            {
                try
                {
                    var products = ParseTxt(ofd.FileName);

                    await UploadProducts(products);

                    MessageBox.Show("Sikeres feltöltés!");
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            }
            LoadAllProduct();
        }

        private async Task LoadOrders()
        {
            using (HttpClient client = new HttpClient())
            {
                var response = await client.GetStringAsync("http://localhost:8000/api/orders");
                var result = JsonConvert.DeserializeObject<OrderResponse>(response);
                Response.DataSource = result.orders;
            }
        }

        private async void Orders_Click(object sender, EventArgs e)
        {
            LoadOrders();
        }

        private async Task DeleteOrder(int id)
        {
            using (HttpClient client = new HttpClient())
            {
                string url = $"http://localhost:8000/api/orders/{id}";
                await client.DeleteAsync(url);
            }
        }

        private async void OrderDelete_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(Response.CurrentRow.Cells["id"].Value);

            await DeleteOrder(id);
            await LoadOrders();
        }

        private async void OrderChangeSave_Click(object sender, EventArgs e)
        {
            if (Response.CurrentRow == null)
            {
                MessageBox.Show("Nincs kiválasztott rendelés!");
                return;
            }

            if (OrdersStatus.SelectedItem == null)
            {
                MessageBox.Show("Válassz státuszt!");
                return;
            }

            var selectedItem = (OrderItem)OrdersItems.SelectedItem;

            var data = new
            {
                item_id = selectedItem.id,
                item_quantity = (int)ItemsQuantity.Value,
                status = OrdersStatus.SelectedItem.ToString()
            };

            using (HttpClient client = new HttpClient())
            {
                var id = Convert.ToInt32(Response.CurrentRow.Cells["id"].Value);

                var json = System.Text.Json.JsonSerializer.Serialize(data);
                var content = new StringContent(json, Encoding.UTF8, "application/json");

                var response = await client.PutAsync($"http://localhost:8000/api/orders/{id}", content);

                if (!response.IsSuccessStatusCode)
                {
                    var error = await response.Content.ReadAsStringAsync();
                    MessageBox.Show(error);
                }
            }

            LoadOrders();
        }
        private void LoadOrdersItems()
        {
            if (Response.SelectedRows.Count == 0)
            {
                return;
            }

            var row = Response.CurrentRow;

            if (row.Cells["status"].Value.ToString().Trim() == "pending")
            {
                OrderDelete.Enabled = true;
                OrderDelete.Visible = true;

                string ids = row.Cells["item_id"].Value.ToString();
                string quantities = row.Cells["item_quantity"].Value.ToString();

                var idList = ids.Split(',')
                    .Select(x => int.Parse(x.Trim()))
                    .ToList();

                var quantityList = quantities.Split(',')
                    .Select(x => int.Parse(x.Trim()))
                    .ToList();

                currentItems = new List<OrderItem>();

                int count = Math.Min(idList.Count, quantityList.Count);

                for (int i = 0; i < count; i++)
                {
                    currentItems.Add(new OrderItem
                    {
                        id = idList[i],
                        quantity = quantityList[i]
                    });
                }

                OrdersItems.DataSource = null;
                OrdersItems.DataSource = currentItems;
                OrdersItems.DisplayMember = "id";
                OrdersItems.ValueMember = "id";
            }
            else
            {
                OrderDelete.Enabled = false;
                OrderDelete.Visible = false;
            }
        }

        private void OrdersItems_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (OrdersItems.SelectedItem is OrderItem selected)
            {
                ItemsQuantity.Value = selected.quantity;
            }
        }

        private void EDITMODE()
        {
            if (Add.Text == "Hozzáadás")
            {
                NameTB.Text = Response.CurrentRow.Cells["name"].Value.ToString();
                PriceNud.Value = Convert.ToDecimal(Response.CurrentRow.Cells["price"].Value);
                DescriptionTB.Text = Response.CurrentRow.Cells["description"].Value.ToString();
                QuantityNud.Value = Convert.ToDecimal(Response.CurrentRow.Cells["quantity"].Value);
                CategorySelect.Text = Response.CurrentRow.Cells["category"].Value.ToString();
                BrandNameTB.Text = Response.CurrentRow.Cells["brandname"].Value.ToString();
                TypeTB.Text = Response.CurrentRow.Cells["type"].Value.ToString();
                Add.Text = "Módosítás";
            }
            else
            {
                NameTB.Clear();
                PriceNud.Value = 0;
                DescriptionTB.Clear();
                QuantityNud.Value = 0;
                CategorySelect.SelectedIndex = 0;
                BrandNameTB.Clear();
                TypeTB.Clear();
                Add.Text = "Hozzáadás";
            }
        }


        private void Response_SelectionChanged(object sender, EventArgs e)
        {
            if (Response.Columns.Contains("item_id") && Response.Columns.Contains("status"))
            {
                OrdersStatus.SelectedItem = Response.CurrentRow.Cells["status"].Value.ToString();
                LoadOrdersItems();
            }
            else
            {
                if(isEditMode)
                {
                    NameTB.Text = Response.CurrentRow.Cells["name"].Value.ToString();
                    PriceNud.Value = Convert.ToDecimal(Response.CurrentRow.Cells["price"].Value);
                    DescriptionTB.Text = Response.CurrentRow.Cells["description"].Value.ToString();
                    QuantityNud.Value = Convert.ToDecimal(Response.CurrentRow.Cells["quantity"].Value);
                    CategorySelect.Text = Response.CurrentRow.Cells["category"].Value.ToString();
                    BrandNameTB.Text = Response.CurrentRow.Cells["brandname"].Value.ToString();
                    TypeTB.Text = Response.CurrentRow.Cells["type"].Value.ToString();
                    Add.Text = "Módosítás";
                }
            }
        }

        private void EDITMODEBTN_Click(object sender, EventArgs e)
        {
            isEditMode = !isEditMode;
            if(!isEditMode)
            {
                EDITMODEBTN.Text = "Szerkesztő mód";
            }
            else
            {
                EDITMODEBTN.Text = "Hozzáadó mód";
            }
            EDITMODE();
        }
    }
}