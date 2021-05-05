using System;
using System.Windows.Forms;
using System.Net.Http;
using System.IO;

namespace EDOSLVS
{
    public partial class Main : Form
    {
        public Main()
        {
            InitializeComponent();
        }

        private void Main_Load(object sender, EventArgs e)
        {
            //先打开exe
            System.Diagnostics.Process.Start(Application.StartupPath + "\\Python\\get_from_php.exe");
            //读取文件获取数据

            //暴力读取文件
            StreamReader juzi = new StreamReader(Application.StartupPath + "\\Python\\get.txt");

            try
            {
                
                for (int i = 0; i < 100; i++)
                {

                    string aSentence = juzi.ReadLine();
                    listBox1.Items.Add(aSentence);
                }
            }
            catch 
            {
                Console.WriteLine("读取文件完成!");
            }

            finally
            {
                juzi.Close();
            }            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string sentence = listBox1.SelectedItem.ToString();
            StreamWriter writeSentencePass = new StreamWriter(Application.StartupPath + "\\Python\\pass.txt");
            writeSentencePass.Write(sentence);
            writeSentencePass.Flush();
            writeSentencePass.Close();
            MessageBox.Show(sentence + "已经通过！","审核系统",MessageBoxButtons.OK,MessageBoxIcon.Information);
            listBox1.Items.Remove(sentence);
            System.Diagnostics.Process.Start(Application.StartupPath + "\\Python\\Yes.exe");
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string sentence = listBox1.SelectedItem.ToString();
            StreamWriter writeSentencePass = new StreamWriter(Application.StartupPath + "\\Python\\die.txt");
            writeSentencePass.Write(sentence);
            writeSentencePass.Flush();
            writeSentencePass.Close();
            MessageBox.Show(sentence + "不能通过！", "审核系统", MessageBoxButtons.OK, MessageBoxIcon.Information);
            listBox1.Items.Remove(sentence);
            for (int i = 0; i < 5000; i++)
            {
                //拖一会儿时间
                Console.WriteLine(i.ToString());
            }
            System.Diagnostics.Process.Start(Application.StartupPath + "\\Python\\No.exe");
        }

        private void button3_Click(object sender, EventArgs e)
        {
            MessageBox.Show("结束审核，放松一下吧！","后会有期",MessageBoxButtons.OK,MessageBoxIcon.Information);
            File.Delete(Application.StartupPath + "\\Python\\get.txt");
            Environment.Exit(0);
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }
    }
}
