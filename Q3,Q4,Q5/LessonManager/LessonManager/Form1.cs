using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml;
using System.Data;
using Microsoft.SqlServer.Server;
using System.IO;
using System.Xml.Linq;

namespace LessonManager
{
    public partial class Form1 : Form
    {
        DataSet dataSet = new DataSet();

        public Form1()
        {
            InitializeComponent();
        }

        

       

        private void button3_Click(object sender, EventArgs e)
        {
            ServiceReference3.WebService1SoapClient soap = new ServiceReference3.WebService1SoapClient();
            string res = soap.GetLesson(2);


            DataSet dataSet = new DataSet();
            DataTable dataTable= new DataTable("Table");
            dataTable.Columns.Add("Log_ID", typeof(string));
            dataTable.Columns.Add("Booking_ID",typeof(string));
            dataTable.Columns.Add("Start_Time", typeof(string));
            dataTable.Columns.Add("Duration", typeof(string));
            dataTable.Columns.Add("Subject", typeof(string));
            dataTable.Columns.Add("Instructor_ID", typeof(string));
            dataTable.Columns.Add("Note", typeof(string));

            dataSet.Tables.Add(dataTable);

           

            System.IO.StringReader xmlSR = new System.IO.StringReader(res);
            dataSet.ReadXml(xmlSR, XmlReadMode.IgnoreSchema);
            dataGridView1.DataSource = dataSet.Tables[0];

        }

        private void button4_Click(object sender, EventArgs e)
        {
            ServiceReference3.WebService1SoapClient soap = new ServiceReference3.WebService1SoapClient();
            //string xml = dataSet.GetXml();

            try
            {
                XDocument Xdoc = new XDocument(new XElement("Users"));
                if (System.IO.File.Exists("D:\\LessonManagerApp.xml"))
                    Xdoc = XDocument.Load("D:\\LessonManagerApp.xml");
                else
                {
                    Xdoc = new XDocument();
                    XElement xmlstart = new XElement("Users");
                    Xdoc.Add(xmlstart);
                }
                XElement xml1 = /*new XElement("Users",*/
                               new XElement("User",
                  new XElement("StartTime", textBox1.Text),
                  new XElement("Duration", customControl11.Text),
                new XElement("Notes", textBox3.Text),
                new XElement("Instructor_ID", comboBox1.Text));

                if (Xdoc.Descendants().Count() > 0)
                    Xdoc.Descendants().First().Add(xml1);
                else
                {
                    Xdoc.Add(xml1);
                }

                Xdoc.Element("Users").Save("D:\\LessonManagerApp.xml");
                soap.UploadNotes("xml1");
                MessageBox.Show("Uploaded Successfully");
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void customControl11_TextChanged(object snder, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            ServiceReference3.WebService1SoapClient soap = new ServiceReference3.WebService1SoapClient();
            string res = soap.GetLessonMgrDetails(2);

            

            DataSet dataSet = new DataSet();
            DataTable dataTable = new DataTable("Table");
            dataTable.Columns.Add("Log_ID", typeof(string));
            dataTable.Columns.Add("Booking_ID", typeof(string));
            dataTable.Columns.Add("Start_Time", typeof(string));
            dataTable.Columns.Add("Duration", typeof(string));
            dataTable.Columns.Add("Subject", typeof(string));
            dataTable.Columns.Add("Instructor_ID", typeof(string));
            dataTable.Columns.Add("Note", typeof(string));

            dataSet.Tables.Add(dataTable);



            System.IO.StringReader xmlSR = new System.IO.StringReader(res);
            dataSet.ReadXml(xmlSR, XmlReadMode.IgnoreSchema);
            dataGridView1.DataSource = dataSet.Tables[0];

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }


              
    }
}
