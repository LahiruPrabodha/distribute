using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace WindowsFormsApplication1
{
    public partial class singup : Form
    {
        public singup()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            booktable booktable = new booktable();
            booktable.Show();
        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            String myConn = "server=localhost;Database=white_rabit;uid=root;pwd=;";
            MySqlConnection conn = new MySqlConnection(myConn);

            try
            {


                conn.Open();
                String myInsertSQL = "insert into customers values (null,@a,@b,@c)";
                MySqlCommand cmd = new MySqlCommand(myInsertSQL, conn);

                cmd.Parameters.AddWithValue("@a", textBox1.Text);//cud id
                cmd.Parameters.AddWithValue("@b", textBox2.Text);
                cmd.Parameters.AddWithValue("@c", textBox3.Text);
                

                cmd.ExecuteNonQuery();
                MessageBox.Show("successful");
            }
            catch (MySqlException ex)
            {
                MessageBox.Show(ex.Message);//Incorrect data
            }
            finally
            {
                conn.Close();
            }
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
