using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

namespace WcfService2
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Service1" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Service1.svc or Service1.svc.cs at the Solution Explorer and start debugging.
    public class Service1 : IService1
    {
        dbconn conObj = new dbconn();

        public string GetData(int value)
        {
            return string.Format("You entered: {0}", value);
        }

        public List<Booking> allBooking()
        {
            string query = "SELECT * FROM booking";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<Booking> result = new List<Booking>();

            foreach (DataRow dr in dt.Rows)
            {
                Booking bk = new Booking
                {
                    Booking_ID = dr["Booking_ID"].ToString(),
                    Subjects = dr["Subjects"].ToString(),
                    Booking_Date = dr["Booking_Date"].ToString(),
                    Booked_Date = dr["Booked_Date"].ToString(),
                    Maximum_Hourly_Rate = dr["Maximum_Hourly_Rate"].ToString(),
                    Start_Time = dr["Start_Time"].ToString(),
                    Duration = dr["Duration"].ToString(),
                    
                    CustomerID = dr["CustomerID"].ToString(),
                    
                    Day = dr["Day"].ToString(),
                    
                    

                };
                result.Add(bk);
            }
            return result;
        }

        public List<Booking> allBookingCustomer(string customerID)
        {
            string query = "SELECT * FROM booking where CustomerID = '" + customerID + "'";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<Booking> result = new List<Booking>();

            foreach (DataRow dr in dt.Rows)
            {
                Booking bk = new Booking
                {
                    Booking_ID = dr["Booking_ID"].ToString(),
                    Booking_Date = dr["Booking_Date"].ToString(),
                    Maximum_Hourly_Rate = dr["Maximum_Hourly_Rate"].ToString(),
                    Duration = dr["Duration"].ToString(),
                    Subjects = dr["Subjects"].ToString(),
                    CustomerID = dr["CustomerID"].ToString(),
                    Start_Time = dr["Start_Time"].ToString(),
                    Day = dr["Day"].ToString()
                };
                result.Add(bk);
            }
            return result;
        }

        public List<user> allCus()
        {
            string query = "SELECT * FROM user";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<user> result = new List<user>();

            foreach (DataRow dr in dt.Rows)
            {
                user us = new user
                {
                    UserID = dr["User_ID"].ToString(),
                    UserName = dr["User_Name"].ToString(),
                    UserType = dr["User_Type"].ToString(),
                    First_name = dr["First_Name"].ToString(),
                    Last_name = dr["Last_Name"].ToString(),
                    Address = dr["Address"].ToString(),
                    Gender = dr["Gender"].ToString(),
                    Dob=dr["Date_Of_Birth"].ToString(),
                    Tp = dr["TP_No"].ToString(),
                  };
                result.Add(us);
            }
            return result;
        }

        public List<user> allCusType(string userType)
        {
            string query = "SELECT * FROM user where User_Type = '" + userType + "'";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<user> result = new List<user>();

            foreach (DataRow dr in dt.Rows)
            {
                user us = new user
                {
                    UserID = dr["User_ID"].ToString(),
                    UserName = dr["User_Name"].ToString(),
                    UserType = dr["User_Type"].ToString(),
                    First_name = dr["First_Name"].ToString(),
                    Last_name = dr["Last_Name"].ToString(),
                    Address = dr["Address"].ToString(),
                    Gender = dr["Gender"].ToString(),
                    Dob = dr["Date_Of_Birth"].ToString(),
                    Tp = dr["TP_No"].ToString(),
                };
                result.Add(us);
            }
            return result;
        }

        public List<user> allCusTypeEmail(string userType, string email)
        {
            string query = "SELECT * FROM user where User_Type = '" + userType + "'and User_Name= '" + email + "'";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<user> result = new List<user>();

            foreach (DataRow dr in dt.Rows)
            {
                user us = new user
                {
                    UserID = dr["User_ID"].ToString(),
                    UserName = dr["User_Name"].ToString(),
                    UserType = dr["User_Type"].ToString(),
                };
                result.Add(us);
            }
            return result;
        }

        public List<Invoice> allInvoice()
        {
            string query = "SELECT * FROM invoice";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<Invoice> result = new List<Invoice>();

            foreach (DataRow dr in dt.Rows)
            {
                Invoice inv = new Invoice
                {
                    Invoice_ID = dr["Invoice_ID"].ToString(),
                    Customer_ID = dr["Customer_ID"].ToString(),
                    Month = dr["Month"].ToString(),
                    Payment_Value = dr["Payment_Value"].ToString(),
                    Payment_Status = dr["Payment_Status"].ToString(),
                 };
                result.Add(inv);
            }
            return result;
        }

        public List<Invoice> allInvoiceCus(string customerID)
        {
            string query = "SELECT * FROM invoice where Customer_ID = '" + customerID + "'";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<Invoice> result = new List<Invoice>();

            foreach (DataRow dr in dt.Rows)
            {
                Invoice inv = new Invoice
                {
                    Invoice_ID = dr["Invoice_ID"].ToString(),
                    Customer_ID = dr["Customer_ID"].ToString(),
                    Month = dr["Month"].ToString(),
                    Payment_Value = dr["Payment_Value"].ToString(),
                    Payment_Status = dr["Payment_Status"].ToString(),
                };
                result.Add(inv);
            }
            return result;
        }

        public List<Invoice> allInvoiceCusMonth(string customerID, string month)
        {
            string query = "SELECT * FROM invoice where Customer_ID = '" + customerID + "'and Month= '" + month + "'";
            DataSet ds = conObj.execQuery(query);
            DataTable dt = new DataTable();
            dt = ds.Tables[0];
            List<Invoice> result = new List<Invoice>();

            foreach (DataRow dr in dt.Rows)
            {
                Invoice inv = new Invoice
                {
                    Invoice_ID = dr["Invoice_ID"].ToString(),
                    Customer_ID = dr["Customer_ID"].ToString(),
                    Month = dr["Month"].ToString(),
                    Payment_Value = dr["Payment_Value"].ToString(),
                    Payment_Status = dr["Payment_Status"].ToString(),
                };
                result.Add(inv);
            }
            return result;
        }
    }
}
