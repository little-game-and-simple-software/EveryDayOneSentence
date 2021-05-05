using System;
using System.Windows.Forms;

namespace EDOSLVS
{
    public partial class Form1 : Form
    {

        public string passwd;

        int errorCount = 0;

        public Form1()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Environment.Exit(10086);
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (errorCount >= 3)
            {
                MessageBox.Show("禁止非法登录！","严重错误", MessageBoxButtons.OK, MessageBoxIcon.Error);
                Environment.Exit(12336);
            }
            if (textBox1.Text == "admin" && textBox2.Text == "dyxsz")
            {
                MessageBox.Show("欢迎您！","登录成功",MessageBoxButtons.OK,MessageBoxIcon.Information);
                Main ourMainForm = new Main();
                ourMainForm.Show();
            }
            else
            {
                MessageBox.Show("用户名或密码错误！您还剩余" + (3-errorCount).ToString() + "次机会！","登录失败",MessageBoxButtons.OK,MessageBoxIcon.Error);
                errorCount++;
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            //加载密码
            
        }
    }
}
