using System;
using System.Collections.Generic;
using System.Text;
using System.Text.Json.Serialization;
using System.Xml.Linq;

namespace APIWinform
{
    public class Product
    {
        public int id { get; set; }
        public string? name { get; set; }

        [JsonNumberHandling(JsonNumberHandling.AllowReadingFromString)]
        public decimal price { get; set; }
        public string? description { get; set; }
        public string? image { get; set; }
        public int quantity { get; set; }
        public string? category { get; set; }
        public string? brandname { get; set; }
        public string? type { get; set; }
        public string? created_at { get; set; }
        public string? updated_at { get; set; }
        public string? deleted_at { get; set; }
        public override string ToString()
        {
            return $"Id: {id} \n Cím: {name} \n Ár: {price}";
        }
    }
}
