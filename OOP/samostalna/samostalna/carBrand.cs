using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace samostalna30okt
{
    internal class carBrand
    {
        private string name;
        private int buyPrice;
        private int sellPrice;
        private int releaseYear;

        public string Name
        {
            get { return name; }
            set { name = value; }
        }

        public int BuyPrice
        {
            get { return buyPrice; }
            set { buyPrice = value; }
        }

        public int SellPrice
        {
            get { return sellPrice; }
            set { sellPrice = value; }
        }

        public int ReleaseYear
        {
            get { return releaseYear; }
            set { releaseYear = value; }
        }

        public carBrand(string name, int buyPrice, int sellPrice, int releaseYear)
        {
            this.name = name;
            this.buyPrice = buyPrice;
            this.sellPrice = sellPrice;
            this.releaseYear = releaseYear;
        }

        public override string ToString()
        {
            return "naziv: " + name + " nabavna cena: " + buyPrice + " prodajna cena: " + sellPrice +
                   " godina izlaska: " + releaseYear;
        }



    }
}