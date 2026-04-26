namespace APIWinform
{
    partial class Form1
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            call = new Button();
            Response = new DataGridView();
            CategoryFilter = new ComboBox();
            Filter = new Button();
            Add = new Button();
            CategorySelect = new ComboBox();
            TypeTB = new TextBox();
            BrandNameTB = new TextBox();
            label1 = new Label();
            label2 = new Label();
            label3 = new Label();
            NameTB = new TextBox();
            label4 = new Label();
            PriceNud = new NumericUpDown();
            label5 = new Label();
            DescriptionTB = new TextBox();
            label6 = new Label();
            ImageAdd = new Button();
            openFileDialog1 = new OpenFileDialog();
            label7 = new Label();
            QuantityNud = new NumericUpDown();
            AllTrashed = new Button();
            DELETE = new Button();
            RESTORE = new Button();
            SoftDelete = new Button();
            Uploade = new Button();
            Orders = new Button();
            OrderDelete = new Button();
            OrdersItems = new ComboBox();
            ItemsQuantity = new NumericUpDown();
            OrderChangeSave = new Button();
            OrdersStatus = new ComboBox();
            EDITMODEBTN = new Button();
            ((System.ComponentModel.ISupportInitialize)Response).BeginInit();
            ((System.ComponentModel.ISupportInitialize)PriceNud).BeginInit();
            ((System.ComponentModel.ISupportInitialize)QuantityNud).BeginInit();
            ((System.ComponentModel.ISupportInitialize)ItemsQuantity).BeginInit();
            SuspendLayout();
            // 
            // call
            // 
            call.Location = new Point(636, 355);
            call.Name = "call";
            call.Size = new Size(121, 23);
            call.TabIndex = 0;
            call.Text = "Összes termék";
            call.UseVisualStyleBackColor = true;
            call.Click += call_Click;
            // 
            // Response
            // 
            Response.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            Response.Location = new Point(12, 16);
            Response.Name = "Response";
            Response.Size = new Size(1097, 331);
            Response.TabIndex = 2;
            Response.SelectionChanged += Response_SelectionChanged;
            // 
            // CategoryFilter
            // 
            CategoryFilter.FormattingEnabled = true;
            CategoryFilter.Items.AddRange(new object[] { "Smartproduct", "Household", "Gaming", "Audio", "Accessories", "Components" });
            CategoryFilter.Location = new Point(763, 355);
            CategoryFilter.Name = "CategoryFilter";
            CategoryFilter.Size = new Size(121, 23);
            CategoryFilter.TabIndex = 3;
            // 
            // Filter
            // 
            Filter.Location = new Point(890, 355);
            Filter.Name = "Filter";
            Filter.Size = new Size(121, 23);
            Filter.TabIndex = 4;
            Filter.Text = "Szűrés";
            Filter.UseVisualStyleBackColor = true;
            Filter.Click += Filter_Click;
            // 
            // Add
            // 
            Add.Location = new Point(1117, 401);
            Add.Name = "Add";
            Add.Size = new Size(100, 41);
            Add.TabIndex = 5;
            Add.Text = "Hozzáadás";
            Add.UseVisualStyleBackColor = true;
            Add.Click += Add_Click;
            // 
            // CategorySelect
            // 
            CategorySelect.FormattingEnabled = true;
            CategorySelect.Items.AddRange(new object[] { "Smartproduct", "Household", "Gaming", "Audio", "Accessories", "Components" });
            CategorySelect.Location = new Point(1117, 284);
            CategorySelect.Name = "CategorySelect";
            CategorySelect.Size = new Size(121, 23);
            CategorySelect.TabIndex = 6;
            // 
            // TypeTB
            // 
            TypeTB.Location = new Point(1117, 372);
            TypeTB.Name = "TypeTB";
            TypeTB.Size = new Size(120, 23);
            TypeTB.TabIndex = 7;
            // 
            // BrandNameTB
            // 
            BrandNameTB.Location = new Point(1117, 328);
            BrandNameTB.Name = "BrandNameTB";
            BrandNameTB.Size = new Size(121, 23);
            BrandNameTB.TabIndex = 8;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(1117, 310);
            label1.Name = "label1";
            label1.Size = new Size(65, 15);
            label1.TabIndex = 9;
            label1.Text = "Márka név:";
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Location = new Point(1117, 354);
            label2.Name = "label2";
            label2.Size = new Size(35, 15);
            label2.TabIndex = 10;
            label2.Text = "Típus";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Location = new Point(1117, 266);
            label3.Name = "label3";
            label3.Size = new Size(102, 15);
            label3.TabIndex = 11;
            label3.Text = "Kategória választó";
            // 
            // NameTB
            // 
            NameTB.Location = new Point(1117, 34);
            NameTB.Name = "NameTB";
            NameTB.Size = new Size(121, 23);
            NameTB.TabIndex = 12;
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Location = new Point(1117, 13);
            label4.Name = "label4";
            label4.Size = new Size(70, 15);
            label4.TabIndex = 13;
            label4.Text = "Termék név:";
            // 
            // PriceNud
            // 
            PriceNud.DecimalPlaces = 2;
            PriceNud.Increment = new decimal(new int[] { 1, 0, 0, 131072 });
            PriceNud.Location = new Point(1117, 166);
            PriceNud.Maximum = new decimal(new int[] { 1215752192, 23, 0, 0 });
            PriceNud.Name = "PriceNud";
            PriceNud.Size = new Size(121, 23);
            PriceNud.TabIndex = 14;
            // 
            // label5
            // 
            label5.AutoSize = true;
            label5.Location = new Point(1117, 148);
            label5.Name = "label5";
            label5.Size = new Size(22, 15);
            label5.TabIndex = 15;
            label5.Text = "Ár:";
            // 
            // DescriptionTB
            // 
            DescriptionTB.Location = new Point(1117, 78);
            DescriptionTB.Multiline = true;
            DescriptionTB.Name = "DescriptionTB";
            DescriptionTB.Size = new Size(152, 67);
            DescriptionTB.TabIndex = 16;
            // 
            // label6
            // 
            label6.AutoSize = true;
            label6.Location = new Point(1115, 60);
            label6.Name = "label6";
            label6.Size = new Size(78, 15);
            label6.TabIndex = 17;
            label6.Text = "Termék leírás:";
            // 
            // ImageAdd
            // 
            ImageAdd.Location = new Point(1117, 195);
            ImageAdd.Name = "ImageAdd";
            ImageAdd.Size = new Size(121, 24);
            ImageAdd.TabIndex = 18;
            ImageAdd.Text = "Kép kiválasztás";
            ImageAdd.UseVisualStyleBackColor = true;
            ImageAdd.Click += ImageAdd_Click;
            // 
            // openFileDialog1
            // 
            openFileDialog1.FileName = "openFileDialog1";
            // 
            // label7
            // 
            label7.AutoSize = true;
            label7.Location = new Point(1117, 222);
            label7.Name = "label7";
            label7.Size = new Size(68, 15);
            label7.TabIndex = 19;
            label7.Text = "Mennyiség:";
            // 
            // QuantityNud
            // 
            QuantityNud.Location = new Point(1117, 240);
            QuantityNud.Maximum = new decimal(new int[] { 1000000, 0, 0, 0 });
            QuantityNud.Name = "QuantityNud";
            QuantityNud.Size = new Size(121, 23);
            QuantityNud.TabIndex = 20;
            // 
            // AllTrashed
            // 
            AllTrashed.Location = new Point(636, 384);
            AllTrashed.Name = "AllTrashed";
            AllTrashed.Size = new Size(121, 23);
            AllTrashed.TabIndex = 21;
            AllTrashed.Text = "Törölt termékek";
            AllTrashed.UseVisualStyleBackColor = true;
            AllTrashed.Click += AllTrashed_Click;
            // 
            // DELETE
            // 
            DELETE.Location = new Point(890, 384);
            DELETE.Name = "DELETE";
            DELETE.Size = new Size(121, 23);
            DELETE.TabIndex = 22;
            DELETE.Text = "Végleges törlés";
            DELETE.UseVisualStyleBackColor = true;
            DELETE.Click += DELETE_Click;
            // 
            // RESTORE
            // 
            RESTORE.Location = new Point(763, 384);
            RESTORE.Name = "RESTORE";
            RESTORE.Size = new Size(121, 23);
            RESTORE.TabIndex = 23;
            RESTORE.Text = "Visszaállítás";
            RESTORE.UseVisualStyleBackColor = true;
            RESTORE.Click += RESTORE_Click;
            // 
            // SoftDelete
            // 
            SoftDelete.Location = new Point(534, 355);
            SoftDelete.Name = "SoftDelete";
            SoftDelete.Size = new Size(96, 23);
            SoftDelete.TabIndex = 24;
            SoftDelete.Text = "Törlés";
            SoftDelete.UseVisualStyleBackColor = true;
            SoftDelete.Click += SoftDelete_Click;
            // 
            // Uploade
            // 
            Uploade.Location = new Point(1085, 489);
            Uploade.Name = "Uploade";
            Uploade.Size = new Size(132, 42);
            Uploade.TabIndex = 25;
            Uploade.Text = "Feltöltés";
            Uploade.UseVisualStyleBackColor = true;
            Uploade.Click += Uploade_Click;
            // 
            // Orders
            // 
            Orders.Location = new Point(12, 355);
            Orders.Name = "Orders";
            Orders.Size = new Size(75, 23);
            Orders.TabIndex = 26;
            Orders.Text = "Rendelések";
            Orders.UseVisualStyleBackColor = true;
            Orders.Click += Orders_Click;
            // 
            // OrderDelete
            // 
            OrderDelete.Location = new Point(93, 355);
            OrderDelete.Name = "OrderDelete";
            OrderDelete.Size = new Size(106, 23);
            OrderDelete.TabIndex = 27;
            OrderDelete.Text = "Rendelés törlése";
            OrderDelete.UseVisualStyleBackColor = true;
            OrderDelete.Click += OrderDelete_Click;
            // 
            // OrdersItems
            // 
            OrdersItems.FormattingEnabled = true;
            OrdersItems.Location = new Point(12, 385);
            OrdersItems.Name = "OrdersItems";
            OrdersItems.Size = new Size(121, 23);
            OrdersItems.TabIndex = 28;
            OrdersItems.SelectedIndexChanged += OrdersItems_SelectedIndexChanged;
            // 
            // ItemsQuantity
            // 
            ItemsQuantity.Location = new Point(151, 384);
            ItemsQuantity.Name = "ItemsQuantity";
            ItemsQuantity.Size = new Size(120, 23);
            ItemsQuantity.TabIndex = 29;
            // 
            // OrderChangeSave
            // 
            OrderChangeSave.Location = new Point(12, 448);
            OrderChangeSave.Name = "OrderChangeSave";
            OrderChangeSave.Size = new Size(121, 23);
            OrderChangeSave.TabIndex = 30;
            OrderChangeSave.Text = "Mentés";
            OrderChangeSave.UseVisualStyleBackColor = true;
            OrderChangeSave.Click += OrderChangeSave_Click;
            // 
            // OrdersStatus
            // 
            OrdersStatus.FormattingEnabled = true;
            OrdersStatus.Items.AddRange(new object[] { "pending", "shipping", "done" });
            OrdersStatus.Location = new Point(12, 419);
            OrdersStatus.Name = "OrdersStatus";
            OrdersStatus.Size = new Size(121, 23);
            OrdersStatus.TabIndex = 31;
            // 
            // EDITMODEBTN
            // 
            EDITMODEBTN.Location = new Point(1012, 416);
            EDITMODEBTN.Name = "EDITMODEBTN";
            EDITMODEBTN.Size = new Size(99, 26);
            EDITMODEBTN.TabIndex = 32;
            EDITMODEBTN.Text = "Szerkeztő Mód";
            EDITMODEBTN.UseVisualStyleBackColor = true;
            EDITMODEBTN.Click += EDITMODEBTN_Click;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1281, 675);
            Controls.Add(EDITMODEBTN);
            Controls.Add(OrdersStatus);
            Controls.Add(OrderChangeSave);
            Controls.Add(ItemsQuantity);
            Controls.Add(OrdersItems);
            Controls.Add(OrderDelete);
            Controls.Add(Orders);
            Controls.Add(Uploade);
            Controls.Add(SoftDelete);
            Controls.Add(RESTORE);
            Controls.Add(DELETE);
            Controls.Add(AllTrashed);
            Controls.Add(QuantityNud);
            Controls.Add(label7);
            Controls.Add(ImageAdd);
            Controls.Add(label6);
            Controls.Add(DescriptionTB);
            Controls.Add(label5);
            Controls.Add(PriceNud);
            Controls.Add(label4);
            Controls.Add(NameTB);
            Controls.Add(label3);
            Controls.Add(label2);
            Controls.Add(label1);
            Controls.Add(BrandNameTB);
            Controls.Add(TypeTB);
            Controls.Add(CategorySelect);
            Controls.Add(Add);
            Controls.Add(Filter);
            Controls.Add(CategoryFilter);
            Controls.Add(Response);
            Controls.Add(call);
            Name = "Form1";
            Text = "Admin Panel";
            ((System.ComponentModel.ISupportInitialize)Response).EndInit();
            ((System.ComponentModel.ISupportInitialize)PriceNud).EndInit();
            ((System.ComponentModel.ISupportInitialize)QuantityNud).EndInit();
            ((System.ComponentModel.ISupportInitialize)ItemsQuantity).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button call;
        private DataGridView Response;
        private ComboBox CategoryFilter;
        private Button Filter;
        private Button Add;
        private ComboBox CategorySelect;
        private TextBox TypeTB;
        private TextBox BrandNameTB;
        private Label label1;
        private Label label2;
        private Label label3;
        private TextBox NameTB;
        private Label label4;
        private NumericUpDown PriceNud;
        private Label label5;
        private TextBox DescriptionTB;
        private Label label6;
        private Button ImageAdd;
        private OpenFileDialog openFileDialog1;
        private Label label7;
        private NumericUpDown QuantityNud;
        private Button AllTrashed;
        private Button DELETE;
        private Button RESTORE;
        private Button SoftDelete;
        private Button Uploade;
        private Button Orders;
        private Button OrderDelete;
        private ComboBox OrdersItems;
        private NumericUpDown ItemsQuantity;
        private Button OrderChangeSave;
        private ComboBox OrdersStatus;
        private Button EDITMODEBTN;
    }
}
