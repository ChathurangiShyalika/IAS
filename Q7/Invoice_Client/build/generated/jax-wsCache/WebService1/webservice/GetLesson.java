
package webservice;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlSchemaType;
import javax.xml.bind.annotation.XmlType;
import javax.xml.datatype.XMLGregorianCalendar;


/**
 * <p>Java class for anonymous complex type.
 * 
 * <p>The following schema fragment specifies the expected content contained within this class.
 * 
 * <pre>
 * &lt;complexType>
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="instructorID" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="lessonDate" type="{http://www.w3.org/2001/XMLSchema}dateTime"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "", propOrder = {
    "instructorID",
    "lessonDate"
})
@XmlRootElement(name = "GetLesson")
public class GetLesson {

    protected int instructorID;
    @XmlElement(required = true)
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar lessonDate;

    /**
     * Gets the value of the instructorID property.
     * 
     */
    public int getInstructorID() {
        return instructorID;
    }

    /**
     * Sets the value of the instructorID property.
     * 
     */
    public void setInstructorID(int value) {
        this.instructorID = value;
    }

    /**
     * Gets the value of the lessonDate property.
     * 
     * @return
     *     possible object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public XMLGregorianCalendar getLessonDate() {
        return lessonDate;
    }

    /**
     * Sets the value of the lessonDate property.
     * 
     * @param value
     *     allowed object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public void setLessonDate(XMLGregorianCalendar value) {
        this.lessonDate = value;
    }

}
