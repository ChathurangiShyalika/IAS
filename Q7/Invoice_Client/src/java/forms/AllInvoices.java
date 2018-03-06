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

import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
public class AllInvoices {
    
    double duration = 0;
    double hourly_rate = 0;
    double total=0;
    
            
        
   
        public double getDuration() {
		return duration;
	}

	@XmlElement
	public void setDuration(double duration) {
		this.duration = duration;
	}
        
        public double getHourly_rate() {
		return hourly_rate;
	}

	@XmlElement
	public void setHourly_rate(double hourly_rate) {
		this.hourly_rate = hourly_rate;
	}
        
        public double getTotal() {
		return total;
	}

	@XmlElement
	public void setTotal(double total) {
		this.total = total;
	}
        
        
        

}
