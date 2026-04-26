using System;
using System.Collections.Generic;
using System.Text;

namespace APIWinform
{
    public class Order
    {
        public int id { get; set; }
        public int user_id { get; set; }
        public string address { get; set; }
        public decimal total_price { get; set; }
        public string item_id { get; set; }
        public string item_quantity { get; set; }
        public string status { get; set; }
        public string? created_at { get; set; }
        public string? updated_at { get; set; }
        public string? deleted_at { get; set; }
    }
}
