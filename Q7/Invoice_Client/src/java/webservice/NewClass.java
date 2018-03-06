/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package webservice;


import javax.ws.rs.client.Client;
import javax.ws.rs.client.ClientBuilder;
import javax.ws.rs.client.WebTarget;
import javax.ws.rs.core.MediaType;

/**
 *
 * @author User
 */
public class NewClass {
    public static void main(String[] args){
        Client client=ClientBuilder.newClient();
        WebTarget target=client.target("http://localhost:3720/Service1.svc/user");
        System.out.println(target.request(MediaType.TEXT_XML).get(String.class)
        );
}
}
