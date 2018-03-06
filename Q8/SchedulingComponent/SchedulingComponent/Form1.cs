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
using MySql.Data;

namespace SchedulingComponent
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string connetionString = null;
            MySqlConnection connection;
            MySqlCommand command;
            String sql1 = null;
             
            MySqlDataAdapter adpter = new MySqlDataAdapter();
            DataSet ds = new DataSet();

            connetionString = "Database=sowpassignmentnew; Data Source=localhost; User Id=root; Password=123";

            connection = new MySqlConnection(connetionString);
            connection.Open();

           sql1="INSERT INTO lessonmanagerapp(Booking_ID,Start_Time,Duration,Day,Subject) SELECT Booking_ID,Start_Time,Duration,Day,Subjects FROM booking ; INSERT into lessonmanagerapp (Instructor_ID) select Instructor_ID from instructor_available_days where Available_Days IN (select Day from booking where booking.Day=instructor_available_days.Available_Days)"; 

            command = new MySqlCommand(sql1, connection);
            adpter.InsertCommand = command;
            adpter.InsertCommand.ExecuteNonQuery();
            MessageBox.Show("Successfuly Scheduled");
            connection.Close();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            
        }
    }
}
