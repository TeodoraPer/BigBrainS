/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Registracija;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.Select;
import org.testng.Assert;
import static org.testng.Assert.*;
import org.testng.annotations.AfterClass;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeClass;
import org.testng.annotations.BeforeMethod;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;
import static rs.ac.bg.etf.lab2.Testovi.driver;

/**
 *
 * @author Teodora
 */
public class RegistracijaSalon {
    WebDriver driver1;
    String baseUrl1 = "http://localhost:8080";
    public RegistracijaSalon() {
    }

    /**
     * Nije unet naziv
     */
   @Test
    public void Registracija_nijeUnetNaziv(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("nazivSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti naziv!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
   
       /**
     * Nije uneto korisnicko ime
     */
   @Test
    public void Registracija_nijeUnetoKorIme(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
             driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("korisnickoImeSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti korisničko ime!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
   
   /**
     * Nije unet email
     */
    @Test
    public void Registracija_nijeUnetEmail(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("emailSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti email!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
   
    
    
    /**
     * Nije uneta broj telefona
     */
   @Test
    public void Registracija_nijeUnetBrTel(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaSalon")).sendKeys("");
            
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("brojTelefonaSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti broj telefona!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
    
   /**
     * Nije uneta adresa 
     */
 @Test
    public void Registracija_nijeUnetaAdresa(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("email@gmail.com");
                    driver1.findElement(By.name("brojTelefonaSalon")).sendKeys("+3812928566");
                    driver1.findElement(By.name("adresaSalon")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("adresaSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti adresu!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
   
       /**
     * Nije uneta lozinka
     */
  @Test
    public void Registracija_nijeUnetaLozinka(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("email@gmail.com");
           driver1.findElement(By.name("brojTelefonaSalon")).sendKeys("+3812928566");
           driver1.findElement(By.name("adresaSalon")).sendKeys("adresa1");
              driver1.findElement(By.name("lozinkaSalon")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("lozinkaSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti lozinku!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
    
    /**
     * Nije uneta potvrda lozinke
     */
  @Test
    public void Registracija_nijeUnetaPotvrdaLozinke(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("email@gmail.com");
           driver1.findElement(By.name("brojTelefonaSalon")).sendKeys("+3812928566");
           driver1.findElement(By.name("adresaSalon")).sendKeys("adresa1");
          driver1.findElement(By.name("lozinkaSalon")).sendKeys("lozinka1");
          driver1.findElement(By.name("potvrdaLozinkeSalon")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("potvrdaLozinkeSalon")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti potvrdu lozinke!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
    
    /**
     * Nije uneto vreme
     */
 @Test
    public void Registracija_nijeUnetoPonPetakOd(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaSalon")).sendKeys("+3812928566");
            driver1.findElement(By.name("adresaSalon")).sendKeys("adresa1");
            driver1.findElement(By.name("lozinkaSalon")).sendKeys("lozinka1");
            driver1.findElement(By.name("potvrdaLozinkeSalon")).sendKeys("lozinka1");
            driver1.findElement(By.name("ponPetakOd")).sendKeys("");
            Thread.sleep(4000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("ponPetakOd")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti vreme!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
      /**
     * Nije uneto vreme
     */
   @Test
    public void Registracija_nijeUnetoPonPetakDo(){ 
         try {
            driver1.findElement(By.name("registracijaLink")).click();
            Thread.sleep(2000);
            driver1.findElement(By.id("salonRadioButton")).click();
            driver1.findElement(By.name("nazivSalon")).sendKeys("naziv1");
            driver1.findElement(By.name("korisnickoImeSalon")).sendKeys("salon1Kor");
            driver1.findElement(By.name("emailSalon")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaSalon")).sendKeys("+3812928566");
            driver1.findElement(By.name("adresaSalon")).sendKeys("adresa1");
            driver1.findElement(By.name("lozinkaSalon")).sendKeys("lozinka1");
            driver1.findElement(By.name("potvrdaLozinkeSalon")).sendKeys("lozinka1");
            driver1.findElement(By.name("ponPetakOd")).sendKeys("10:00:AM");
             driver1.findElement(By.name("ponPetakDo")).sendKeys("");
            Thread.sleep(4000);
            driver1.findElement(By.name("submitSalon")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("ponPetakDo")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti vreme!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
       
    }
   
    @BeforeTest
    public void setUpBeforeEachTest() {

        System.setProperty("webdriver.chrome.driver", "C:\\Users\\Teodora\\Desktop\\chromedriver.exe");
        driver1 = new ChromeDriver();
        driver1.get(baseUrl1);
        driver1.manage().window().maximize();
    }

    @AfterTest
    public void setUpAfterEachTest() {
        if (driver1 != null) {
            driver1.close();
        }
    }
}
