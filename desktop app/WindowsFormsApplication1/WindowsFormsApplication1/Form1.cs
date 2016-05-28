using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.Common;
using MySql.Data.MySqlClient;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }


        private void button1_Click(object sender, EventArgs e)
        {
            if(un.Text == "mng" || psw.Text == "123")
 
            {
                booktable booktable = new booktable();
                booktable.Show();
                
                
               

            }


            else

            {

                MessageBox.Show("Lohin Fail");

            }
        }

           // String myConn = "server=localhost;Database=white_rabit;uid=root;pwd=;";
           // MySqlConnection conn = new MySqlConnection(myConn);
           // MySqlDataAdapter adapter;
           // DataTable table = new DataTable();

           // try
           // {
               // adapter = new MySqlDataAdapter("SELECT `username`, `password` FROM `users` WHERE `username` = '" + un.Text + "' AND `password` = '" + psw.Text + "'", conn);
              //  adapter.Fill(table);
               // if (table.Rows.Count <= 0)
               // {
                  //  panel1.Height = 0;
                    //label_Message.ForeColor = Color.Red;
                    //label_Message.Text = "Invalid Username Or Password";
                    //timer1.Start();
               // }
               // else
              //  {
                   // panel1.Height = 0;
                   // label_Message.ForeColor = Color.Green;
                   // label_Message.Text = "Login Successfully";
                    //timer1.Start();
               // }
               // table.Clear();
           // }
           // catch (MySqlException ex)
          // {
          //     MessageBox.Show(ex.Message);//Incorrect data
           // }
       // }












        private void button2_Click(object sender, EventArgs e)
        {
            singup singup = new singup();
            singup.Show();
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void psw_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
