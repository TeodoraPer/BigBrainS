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
 * @author Teodora Peric 0283/18 Funkcionalnost Registracija U testovima se
 * proverava da li su uneta polja, hvata se poruka koja je postavljena od strane
 * validatora pri pisanju html koda Ovo se ne moze uhvatiti u Selenium IDE-u
 */
public class RegistracijaKorisnik {

    WebDriver driver1;
    String baseUrl1 = "http://localhost:8080";

    public RegistracijaKorisnik() {
    }

    public void popuniPolja(String ime, String prezime, String korIme, String email, String brojTel, String adresa, String loz, String potvrdaLoz) {

        driver1.findElement(By.name("imeKorisnik")).sendKeys(ime);
        driver1.findElement(By.name("prezimeKorisnik")).sendKeys(prezime);
        driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys(korIme);
        driver1.findElement(By.name("emailKorisnik")).sendKeys(email);
        driver1.findElement(By.name("brojTelefonaKorisnik")).sendKeys(brojTel);
        driver1.findElement(By.name("adresaKorisnik")).sendKeys(adresa);
        driver1.findElement(By.name("lozinkaKorisnik")).sendKeys(loz);
        driver1.findElement(By.name("potvrdaLozinkeKorisnik")).sendKeys(potvrdaLoz);
    }

    /**
     * Nije uneto korisnicko ime
     *
     */
    @Test
    public void RegistracijaChromeTest_nijeUnetoKorisnickoIme() {
        try {
            driver1.findElement(By.name("registracijaLink")).click();
                driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("imeKorisnik")).getAttribute("validationMessage");

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
            driver1.findElement(By.name("registracijaLink")).click();
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("prezimeKorisnik")).getAttribute("validationMessage");

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
            driver1.findElement(By.name("registracijaLink")).click();
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("korisnickoImeKorisnik")).getAttribute("validationMessage");

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
            driver1.findElement(By.name("registracijaLink")).click();
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys("korisnik1");
             driver1.findElement(By.name("emailKorisnik")).sendKeys("");
       
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("emailKorisnik")).getAttribute("validationMessage");

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
            driver1.findElement(By.name("registracijaLink")).click();
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailKorisnik")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("brojTelefonaKorisnik")).getAttribute("validationMessage");

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
            driver1.findElement(By.name("registracijaLink")).click();
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailKorisnik")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaKorisnik")).sendKeys("+3812926411");
            driver1.findElement(By.name("adresaKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("adresaKorisnik")).getAttribute("validationMessage");

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
            driver1.findElement(By.name("registracijaLink")).click();
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailKorisnik")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaKorisnik")).sendKeys("+3812926411");
            driver1.findElement(By.name("adresaKorisnik")).sendKeys("adresa1");
            driver1.findElement(By.name("lozinkaKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("lozinkaKorisnik")).getAttribute("validationMessage");

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
              driver1.findElement(By.id("korisnikRadioButton")).click();
            driver1.findElement(By.name("imeKorisnik")).sendKeys("ime1");
            driver1.findElement(By.name("prezimeKorisnik")).sendKeys("prezime1");
            driver1.findElement(By.name("korisnickoImeKorisnik")).sendKeys("korisnik1");
            driver1.findElement(By.name("emailKorisnik")).sendKeys("email@gmail.com");
            driver1.findElement(By.name("brojTelefonaKorisnik")).sendKeys("+3812926411");
            driver1.findElement(By.name("adresaKorisnik")).sendKeys("adresa1");
            driver1.findElement(By.name("lozinkaKorisnik")).sendKeys("lozinka1"); 
            driver1.findElement(By.name("potvrdaLozinkeKorisnik")).sendKeys("");
            Thread.sleep(2000);
            driver1.findElement(By.name("submitKorisnik")).click();
            Thread.sleep(2000);
            String message = driver1.findElement(By.name("potvrdaLozinkeKorisnik")).getAttribute("validationMessage");

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
