/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Registracija;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
import static org.testng.Assert.*;
import org.testng.annotations.AfterClass;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeClass;
import org.testng.annotations.BeforeMethod;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

/**
 *
 * @author Teodora
 */
public class RegistracijaMenadzer {
     WebDriver driver1;
    String baseUrl1 = "http://localhost:8080";

    public RegistracijaMenadzer() {
    }

    /**
     * Nije uneto korisnicko ime
     *
     */
  @Test
    public void RegistracijaChromeTest_nijeUnetoIme() {
        try {
            driver1.findElement(By.name("registracijaLink")).click();
             driver1.findElement(By.id("menadzerRadioButton")).click();
            driver1.findElement(By.name("imeMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("imeMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti ime!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }

    }

    /**
     * Nije uneto prezime
     *
     */
     @Test
    public void RegistracijaChromeTest_nijeUnetoPrezime() {
            try {
            driver1.findElement(By.name("registracijaLink")).click(); driver1.findElement(By.id("menadzerRadioButton")).click();
            driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("prezimeMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti prezime!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
    }

        /**
     * Nije uneto korisnicko ime
     *
     */
     @Test
    public void RegistracijaChromeTest_nijeUnetoKorIme() {
            try {
            driver1.findElement(By.name("registracijaLink")).click(); driver1.findElement(By.id("menadzerRadioButton")).click();
            driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("korisnickoImeMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti korisničko ime!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
    }
    
    /**
     * Nije unet email
     *
     */
    @Test
    public void RegistracijaChromeTest_nijeUnetEmail() {
            try {
            driver1.findElement(By.name("registracijaLink")).click(); driver1.findElement(By.id("menadzerRadioButton")).click();
            driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeMenadzer")).sendKeys("korisnik1");
             driver1.findElement(By.name("emailMenadzer")).sendKeys("");
       
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("emailMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti email!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
    }
    
        /**
     * Nije unet broj telefona
     *
     */
    @Test
    public void RegistracijaChromeTest_nijeUnetBrTel() {
            try {
            driver1.findElement(By.name("registracijaLink")).click(); driver1.findElement(By.id("menadzerRadioButton")).click();
            driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeMenadzer")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailMenadzer")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("brojTelefonaMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti broj telefona!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
    }
    
     /**
     * Nije uneta adresa
     *
     */
   @Test
    public void RegistracijaChromeTest_nijeUnetaAdresa() {
            try {
            driver1.findElement(By.name("registracijaLink")).click(); driver1.findElement(By.id("menadzerRadioButton")).click();
            driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeMenadzer")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailMenadzer")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaMenadzer")).sendKeys("+3812926411");
            driver1.findElement(By.name("adresaMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("adresaMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti adresu!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
    }
    
     /**
     * Nije uneta lozinka
     *
     */
   @Test
    public void RegistracijaChromeTest_nijeUnetaLozinka() {
            try {
             driver1.findElement(By.name("registracijaLink")).click(); driver1.findElement(By.id("menadzerRadioButton")).click();
           Thread.sleep(2000);
             driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeMenadzer")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailMenadzer")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaMenadzer")).sendKeys("+3812926411");
            driver1.findElement(By.name("adresaMenadzer")).sendKeys("adresa1");
            driver1.findElement(By.name("lozinkaMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("lozinkaMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti lozinku!");
            Thread.sleep(2000);
            Thread.sleep(2000);
        } catch (Exception e) {
        }
    }
    
      /**
     * Nije uneta potvrda lozinke
     *
     */
    @Test
    public void RegistracijaChromeTest_nijeUnetaPotvrdaLozinke() {
            try {
             driver1.findElement(By.name("registracijaLink")).click(); 
             
              Thread.sleep(2000);
             driver1.findElement(By.id("menadzerRadioButton")).click();
              Thread.sleep(2000);
             driver1.findElement(By.name("imeMenadzer")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeMenadzer")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeMenadzer")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailMenadzer")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaMenadzer")).sendKeys("+3812926411");
            driver1.findElement(By.name("adresaMenadzer")).sendKeys("adresa1");
            driver1.findElement(By.name("lozinkaMenadzer")).sendKeys("lozinka1");
            driver1.findElement(By.name("potvrdaLozinkeMenadzer")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitMenadzer")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("potvrdaLozinkeMenadzer")).getAttribute("validationMessage");

            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti potvrdu lozinke!");
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
