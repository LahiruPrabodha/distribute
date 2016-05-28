using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data;
using MySql.Data.MySqlClient;




namespace WindowsFormsApplication1
{
    public partial class booktable : Form
    {
        public booktable()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            String myConn = "server=localhost;Database=white_rabit;uid=root;pwd=mysql;";
            MySqlConnection conn = new MySqlConnection(myConn);

            try
            {


                conn.Open();
                String myInsertSQL = "insert into tablebooking values (null,@cn,@date,@time,@tebleno,@connum)";
                MySqlCommand cmd = new MySqlCommand(myInsertSQL, conn);

                cmd.Parameters.AddWithValue("@cn", textBox1.Text);//cud id
                cmd.Parameters.AddWithValue("@date", dateTimePicker1.Text);
                cmd.Parameters.AddWithValue("@time", comboBox1.Text);
                cmd.Parameters.AddWithValue("@tebleno", textBox3.Text);
                cmd.Parameters.AddWithValue("@connum", textBox4.Text);
               
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

        private void Form3_Load(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
