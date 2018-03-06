using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using MySql.Data;
using MySql;
using System.Data;
using System.Configuration;

namespace WebApplication1
{
    public class dbconn
    {

        string connectionString = null;
        public MySqlConnection con;

        public dbconn()
        {
            connectionString = "Database=sowpassignmentnew; Data Source=localhost; User Id=root; Password=123";
            try
            {
                con = new MySqlConnection(connectionString);
                con.Open();
                Console.WriteLine("Connection Opened");

            }
            catch (Exception ex)
            {
                Console.WriteLine("Connection Open failed");

            }


        }

        public DataSet execQuery(string query)
        {
            DataSet results = new DataSet();
            try
            {
                MySqlDataAdapter sql = new MySqlDataAdapter(query, connectionString);
                sql.Fill(results);
            }
            catch (Exception ex)
            {
                Console.WriteLine("Error : " + ex);
                System.Diagnostics.Debug.Write("Error : " + ex);
            }
            return results;
        }


        public int execNonQuery(string query)
        {
            int condition = -1;
            try
            {
                MySqlCommand cmd1 = new MySqlCommand(query, con);
                condition = cmd1.ExecuteNonQuery();

            }
            catch (Exception ex)
            {
                Console.WriteLine("Error :" + ex);
                System.Diagnostics.Debug.Write("Error :" + ex);
            }
            finally
            {
                con.Close();
            }

            return condition;
        }


    }
}