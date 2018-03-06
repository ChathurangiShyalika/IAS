using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Data;
using System.IO;
using MySql.Data.MySqlClient;
using MySql.Data;
using System.Configuration;
using System.Xml;
using System.Data.SqlClient;
using System.Xml.Linq;


namespace WebApplication1
{
    /// <summary>
    /// Summary description for WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {
        dbconn conObj = new dbconn();




        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }

        [WebMethod]
        public string GetLesson(int Instructor_ID)
        {
            String sql = "Select * from lessonmanagerapp";
            //select sql
            DataSet dataset = conObj.execQuery(sql);
            StringWriter sw = new StringWriter();
            dataset.WriteXml(sw, XmlWriteMode.IgnoreSchema);
            string xmlResult = sw.ToString();
            return xmlResult;

        }

        [WebMethod]
        public string GetLessonMgrDetails(int Booking_ID)
        {
            String sql = "Select * from lessonmanagerapp where Booking_ID ='" + Booking_ID + "' ";
            //select sql
            DataSet dataset = conObj.execQuery(sql);
            StringWriter sw = new StringWriter();
            dataset.WriteXml(sw, XmlWriteMode.IgnoreSchema);
            string xmlResult = sw.ToString();
            return xmlResult;

        }

        [WebMethod]
        public string GetDoB(string day1, string day2)
        {
            String sql = "Select Date_Of_Birth from user inner join instructor on user.UserID=instructor.UserID inner join instructor.Instructor_ID=booking.Instructor_ID where booking.Booking_Date>'" + day1 + "' && <'" + day2 + "'";
            //select sql
            DataSet dataset = conObj.execQuery(sql);
            StringWriter sw = new StringWriter();
            dataset.WriteXml(sw, XmlWriteMode.IgnoreSchema);
            string xmlResult = sw.ToString();
            return xmlResult;

        }

        [WebMethod]
        public string UploadNotes(string Start_Time, decimal duration, string note)
        {
            string connetionString = null;
            MySqlConnection connection;
            MySqlCommand command;
            MySqlDataAdapter adpter = new MySqlDataAdapter();
            DataSet ds = new DataSet();
            XmlReader xmlFile;
            string sql = null;
            string filePath = "";

            string StartTime = "";
            string Duration = "";
            string Note = "";
            string InstructorID = "";

            connetionString = "Database=sowpassignmentnew; Data Source=localhost; User Id=root; Password=123";

            connection = new MySqlConnection(connetionString);
            connection.Open();


            xmlFile = XmlReader.Create("D:\\LessonManagerApp.xml", new XmlReaderSettings());
            ds.ReadXml(xmlFile);

            
            int i = 0;
            
            XmlDocument xml = new XmlDocument();
            filePath = @"D:\\LessonManagerApp.xml";
            xml.Load(filePath);

            int count = xml.SelectNodes("Users/User").Count;
            
            
            StartTime = xml.SelectSingleNode("Users/User[last()]/StartTime").InnerText;
            Duration = xml.SelectSingleNode("Users/User[last()]/Duration").InnerText;
            Note = xml.SelectSingleNode("Users/User[last()]/Notes").InnerText;
            InstructorID = xml.SelectSingleNode("Users/User[last()]/Instructor_ID").InnerText;

            
            sql = "insert into lessonmanager values('" + (count) + "','" + StartTime + "','" + Duration + "','" + Note + "','" + InstructorID + "')";

           
            command = new MySqlCommand(sql, connection);
            adpter.InsertCommand = command;
            adpter.InsertCommand.ExecuteNonQuery();
            connection.Close();
            
            StringWriter sw = new StringWriter();
            string xmlResult = sw.ToString();
            return xmlResult;
        }
           
            
        }

                }

            
        
    

