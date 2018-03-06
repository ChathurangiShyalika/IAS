/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package forms;

/**
 *
 * @author User
 */

import java.util.List;
import java.util.ArrayList;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;


@XmlRootElement(name="InvoiceList")
public class AllInvoiceList {
   List<AllInvoices> allInvoiceList;
   
    /**
     *
     * @param allInvoiceList
     */
   
    @XmlElement( name = "Invoice" )
    public void setAllInvoiceList(List<AllInvoices> allInvoiceList)
    {
        this.allInvoiceList = allInvoiceList;
    }
    
    public List<AllInvoices> getAllInvoiceList()
    {
        return allInvoiceList;
    }

    public void add( AllInvoices allInvoices )
{
if( this.allInvoiceList == null )
{
this.allInvoiceList = new ArrayList<AllInvoices>();
}

this.allInvoiceList.add( allInvoices );



}

}
