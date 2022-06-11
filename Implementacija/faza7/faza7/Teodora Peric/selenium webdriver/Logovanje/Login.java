package Logovanje;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
 * @author Teodora Peric 0283/18 Funkcionalnost Logovanje U testovima se
 * proverava da li su uneta polja, hvata se poruka koja je postavljena od strane
 * validatora pri pisanju html koda Ovo se ne moze uhvatiti u Selenium IDE-u
 */
public class Login {

    WebDriver driver1;
    String baseUrl1 = "http://localhost:8080";

    public Login() {
    }

    /**
     * Nije uneto korisnicko ime
    *
     */
    @Test
    public void LoginChromeTest_nijeUnetoKorisnickoIme() {
        
        driver1.findElement(By.name("loginLink")).click();
        driver1.findElement(By.name("korime")).sendKeys("");

        driver1.findElement(By.name("lozinka")).sendKeys("12345");

        driver1.findElement(By.name("loginDugme")).click();

        String message = driver1.findElement(By.name("korime")).getAttribute("validationMessage");
        try {
            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti korisnicko ime!");
            Thread.sleep(2000);
            driver1.findElement(By.name("lozinka")).clear();
            Thread.sleep(2000);
        } catch (Exception e) {
        }

    }

    /**
     * Nije uneta lozinka
     */
    @Test
    public void LoginChromeTest_nijeUnetaLozinka() {
        driver1.findElement(By.name("loginLink")).click();
        driver1.findElement(By.name("korime")).sendKeys("micika");

        driver1.findElement(By.name("lozinka")).sendKeys("");

        driver1.findElement(By.name("loginDugme")).click();

        String message = driver1.findElement(By.name("lozinka")).getAttribute("validationMessage");
        try {
            System.out.print(message);
            Assert.assertEquals(message, "Morate uneti lozinku!");
            Thread.sleep(2000);
            driver1.findElement(By.name("korime")).clear();
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
