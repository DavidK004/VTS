using samostalna30okt;

internal class Program
{
    private static void Main(string[] args)
    {
        string path = @"C:\Davidk\data1.txt";
        List<string> Data = File.ReadAllLines(path).ToList();
        int countI = 0;
        int countC = 0;
        foreach (string line in Data)
        {
            Console.WriteLine(line.ToUpper());
            foreach(char c in line)
            {
                if (c=='i')
                {
                    countI++;
                }
                else if (c=='c')
                {
                    countC++;
                }
                else if (c == 'C')
                {
                    countC++;
                }
            }


        }
        Console.WriteLine("Number of appearances of the letter i:" + countI);
        Console.WriteLine("Number of appearances of the letter c or C: " + countC);

        Console.WriteLine("==============================================================");
        string path2 = @"C:\Davidk\data2.txt";
        int counter = 0;
        int THEcounter = 0;
        string[] first20Chars;
        List<string> Data2 = File.ReadAllLines(path2).ToList();
        Data.AddRange(Data2);
        foreach (string line in Data)
        {
            Console.WriteLine(line);
        }
        foreach (string line in Data)
        {
            string[] parts = line.Split(' ');
            counter+=parts.Length;
            for (int i = 0; i < parts.Length; i++)
            {
                if (parts[i]=="the" || parts[i]=="The")
                {
                    THEcounter++;
                }
            }
            int limit = 0;
            foreach (char c in line)
            {
                if (limit >= 20)
                {
                    break;
                }
                Console.WriteLine(c);
                limit++;
            }
        }
        Console.WriteLine("Number of words in the combined text: " + counter);
        Console.WriteLine("THEcounter: " + THEcounter);
        string allData = File.ReadAllText(path) + File.ReadAllText(path2);
        Console.WriteLine(allData);
        string[] parts2 = allData.Split(' ');
        for (int i =0; i<parts2.Length; i++)
        {
            if (parts2[i] =="the" || parts2[i] =="The")
            {
                Console.WriteLine("THEindex: " + i);
            }
        }

        string[] str1 = { "jun", "jul", "maj", "avg", "sep" };
        List<string> strList = new List<string>();
        strList.AddRange(str1);
        foreach (string str in strList)
        {
            Console.WriteLine(str);
        }
        Console.WriteLine("====================================");
        strList.Reverse();
        foreach (string str in strList)
        {
            Console.WriteLine(str);
        }
        Console.WriteLine("====================================");
        strList.Sort();

        foreach (string str in strList)
        {
            Console.WriteLine(str);
        }

        List<int> numList = new List<int> { 10, 12, 14, 16, 18 };
        List<int> numList2 = new List<int> { 11, 13, 15, 17, 19 };
        foreach (int num in numList)
        {
            Console.WriteLine(num);
        }
        Console.WriteLine("=====================================");
        foreach (int num in numList2)
        {
            Console.WriteLine(num);
        }

        List<int> numList3 = new List<int>();
        numList3.AddRange(numList);
        numList3.AddRange(numList2);
        Console.WriteLine("=====================================");
        foreach (int num in numList3)
        {
            Console.WriteLine(num);
        }

        carBrand First = new carBrand("Yugo", 10000, 12000, 1980);
        Console.WriteLine(First.Name);
        Console.WriteLine(First.BuyPrice);
        Console.WriteLine(First.SellPrice);
        First.ReleaseYear = 1978;
        Console.WriteLine(First.ReleaseYear);
        Console.WriteLine(First.ToString());

    }
}
