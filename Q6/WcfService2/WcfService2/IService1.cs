using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

namespace WcfService2
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the interface name "IService1" in both code and config file together.
    [ServiceContract]
    public interface IService1
    {

        [OperationContract]
        string GetData(int value);

        [OperationContract]
        [WebGet(UriTemplate = "/booking")]
        List<Booking> allBooking();

        [OperationContract]
        [WebGet(UriTemplate = "/booking/{customerID}")]
        List<Booking> allBookingCustomer(string customerID);

        [OperationContract]
        [WebGet(UriTemplate = "/user")]
        List<user> allCus();

        [OperationContract]
        [WebGet(UriTemplate = "/user/{userType}")]
        List<user> allCusType(string userType);

        [OperationContract]
        [WebGet(UriTemplate = "/user/{userType}/{email}")]
        List<user> allCusTypeEmail(string userType, string email);

        [OperationContract]
        [WebGet(UriTemplate = "/invoice")]
        List<Invoice> allInvoice();

        [OperationContract]
        [WebGet(UriTemplate = "/invoice/{customerID}")]
        List<Invoice> allInvoiceCus(string customerID);

        [OperationContract]
        [WebGet(UriTemplate = "/invoice/{customerID}/{month}")]
        List<Invoice> allInvoiceCusMonth(string customerID, string month);
        // TODO: Add your service operations here
    }


    // Use a data contract as illustrated in the sample below to add composite types to service operations.
    [DataContract]
    public class CompositeType
    {
        bool boolValue = true;
        string stringValue = "Hello ";

        [DataMember]
        public bool BoolValue
        {
            get { return boolValue; }
            set { boolValue = value; }
        }

        [DataMember]
        public string StringValue
        {
            get { return stringValue; }
            set { stringValue = value; }
        }
    }

    [DataContract]
    public class customer
    {
        string customerID = "C001";
        string username = "DefaultName";
        string email = "DefaultEmail";
        

        [DataMember]
        public string CustomerID
        {
            get { return customerID; }
            set { customerID = value; }
        }

        [DataMember]
        public string UserName
        {
            get { return username; }
            set { username = value; }
        }

        [DataMember]
        public string Email
        {
            get { return email; }
            set { email = value; }
        }
    }

    [DataContract]
    public class user
    {
        string userID = "001";
        string userName = "DefaultName";
        string userType = "DefaultType";
        string first_name = "DefaultFname";
        string last_name = "DefaultLname";
        string address = "DefaultAdd";
        string gender = "DefaultGender";
        string dob = "Defaultdob";
        string tp = "DefaultTP";

        [DataMember]
        public string UserID
        {
            get { return userID; }
            set { userID = value; }
        }

        [DataMember]
        public string UserName
        {
            get { return userName; }
            set { userName = value; }
        }

        [DataMember]
        public string UserType
        {
            get { return userType; }
            set { userType = value; }
        }




        [DataMember]
        public string First_name
        {
            get { return first_name; }
            set { first_name = value; }
        }

        [DataMember]
        public string Last_name
        {
            get { return last_name; }
            set { last_name = value; }
        }

        [DataMember]
        public string Address
        {
            get { return address; }
            set { address = value; }
        }

        [DataMember]
        public string Gender
        {
            get { return gender; }
            set { gender = value; }
        }

        [DataMember]
        public string Tp
        {
            get { return tp; }
            set { tp = value; }
        }

        [DataMember]
        public string Dob
        {
            get { return dob; }
            set { dob = value; }
        }

    }


    [DataContract]
    public class instructor
    {
        string instructorID = "I001";
        string hourly_rate = "DefaultRate";

        [DataMember]
        public string InstructorID
        {
            get { return instructorID; }
            set { instructorID = value; }
        }

        [DataMember]
        public string Hourly_rate
        {
            get { return hourly_rate; }
            set { hourly_rate = value; }
        }

    }


    [DataContract]
    public class Booking
    {
        string booking_ID = "C001";
        string subjects = "Sinhala";
        string year = "2016";
        string month = "sep";
        string date = "22";
        string booking_Date = "DefaultDate";
        string maximum_Hourly_Rate = "DefaultMonth";
        string duration = "DefaultMonth";
        string customerID = "C001";
        string day = "";
        string start_Time = "";
        string instructor_ID="";
        

        public string Day
        {
            get { return day; }
            set { day = value; }
        }
       

        public string Start_Time
        {
            get { return start_Time; }
            set { start_Time = value; }
        }


        [DataMember]
        public string Booking_ID
        {
            get { return booking_ID; }
            set { booking_ID = value; }
        }

        [DataMember]
        public string Instructor_ID
        {
            get { return instructor_ID; }
            set { instructor_ID = value; }
        }

        [DataMember]
        public string CustomerID
        {
            get { return customerID; }
            set { customerID = value; }
        }

        [DataMember]
        public string Booking_Date
        {
            get { return booking_Date; }
            set { booking_Date = value; }
        }

        

        [DataMember]
        public string Duration
        {
            get { return duration; }
            set { duration = value; }
        }

       

        [DataMember]
        public string Booked_Date
        {
            get { return booking_Date; }
            set { booking_Date = value; }
        }

        [DataMember]
        public string Subjects
        {
            get { return subjects; }
            set { subjects = value; }
        }

        [DataMember]
        public string Maximum_Hourly_Rate
        {
            get { return maximum_Hourly_Rate; }
            set { maximum_Hourly_Rate = value; }
        }
    }

    [DataContract]
    public class Invoice
    {
        string invoice_ID = "";

        public string Invoice_ID
        {
            get { return invoice_ID; }
            set { invoice_ID = value; }
        }
        string customer_ID = "";

        public string Customer_ID
        {
            get { return customer_ID; }
            set { customer_ID = value; }
        }
        string month = "sep";

        public string Month
        {
            get { return month; }
            set { month = value; }
        }
        string payment_Value = "";

        public string Payment_Value
        {
            get { return payment_Value; }
            set { payment_Value = value; }
        }
        string payment_Status = "";

        public string Payment_Status
        {
            get { return payment_Status; }
            set { payment_Status = value; }
        }

    }
        
}
