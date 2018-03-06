
package webservice;

import javax.xml.bind.annotation.XmlRegistry;


/**
 * This object contains factory methods for each 
 * Java content interface and Java element interface 
 * generated in the webservice package. 
 * <p>An ObjectFactory allows you to programatically 
 * construct new instances of the Java representation 
 * for XML content. The Java representation of XML 
 * content can consist of schema derived interfaces 
 * and classes representing the binding of schema 
 * type definitions, element declarations and model 
 * groups.  Factory methods for each of these are 
 * provided in this class.
 * 
 */
@XmlRegistry
public class ObjectFactory {


    /**
     * Create a new ObjectFactory that can be used to create new instances of schema derived classes for package: webservice
     * 
     */
    public ObjectFactory() {
    }

    /**
     * Create an instance of {@link HelloWorldResponse }
     * 
     */
    public HelloWorldResponse createHelloWorldResponse() {
        return new HelloWorldResponse();
    }

    /**
     * Create an instance of {@link GetLessonResponse }
     * 
     */
    public GetLessonResponse createGetLessonResponse() {
        return new GetLessonResponse();
    }

    /**
     * Create an instance of {@link UploadNotesResponse }
     * 
     */
    public UploadNotesResponse createUploadNotesResponse() {
        return new UploadNotesResponse();
    }

    /**
     * Create an instance of {@link GetLesson }
     * 
     */
    public GetLesson createGetLesson() {
        return new GetLesson();
    }

    /**
     * Create an instance of {@link UploadNotes }
     * 
     */
    public UploadNotes createUploadNotes() {
        return new UploadNotes();
    }

    /**
     * Create an instance of {@link HelloWorld }
     * 
     */
    public HelloWorld createHelloWorld() {
        return new HelloWorld();
    }

}
