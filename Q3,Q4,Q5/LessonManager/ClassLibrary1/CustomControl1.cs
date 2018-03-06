using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ClassLibrary1
{
    public partial class CustomControl1 : TextBox
    {
        private int limit;

        public int Limit
        {
            get { return limit; }
            set { limit = value; }
        }
        public CustomControl1()
        {
            InitializeComponent();
            //this.KeyPress += new KeyPressEventHandler(textBox1_KeyPress);
            this.TextChanged += new EventHandler(textBox1_TextChanged);
        }

        protected override void OnPaint(PaintEventArgs pe)
        {
            base.OnPaint(pe);
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            //MessageBox.Show("Hi");
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            int val = Convert.ToInt32(this.Text);
            if (val > limit)
                this.ForeColor = Color.Red;
            else
                this.ForeColor = Color.Black;
        }
    }
}
