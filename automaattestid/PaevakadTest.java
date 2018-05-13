import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;

import java.util.concurrent.TimeUnit;

import static junit.framework.TestCase.assertEquals;

public class PaevakadTest {

    static WebDriver driver;
    static WebDriverWait wait;

    String baseUrl = "https://paevakad1.000webhostapp.com/";

    @Before
    public void setUp() {
        System.setProperty("webdriver.gecko.driver", "C:\\Users\\Rnee\\Downloads\\geckodriver-v0.20.1-win64\\geckodriver.exe");
        driver = new FirefoxDriver();
        driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
        driver.get(baseUrl);
        wait = new WebDriverWait(driver, 10);
    }

    @After
    public void tearDown() {
        driver.close();
    }

    @Test
    public void SisseJaValjaLogimineTest() {

        // "Logi Sisse" nupp
        driver.findElement(By.xpath("/html/body/nav/div/ul[2]/li/a")).click();

        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form")));


        // "Email" input väli
        driver.findElement(By.xpath("/html/body/form/div[1]/div/input")).sendKeys("m@h.l");
        // "Password" input väli
        driver.findElement(By.xpath("/html/body/form/div[2]/div/input")).sendKeys("asdfgh");
        // "Submit" nupp
        driver.findElement(By.xpath("/html/body/form/div[4]/div/button")).click();

        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/nav/div/ul[1]/ul/li")));
        assertEquals("Logitud sisse kui: m@h.l", driver.findElement(By.xpath("/html/body/nav/div/ul[1]/ul/li")).getText());

        // "Logi välja" nupp
        driver.findElement(By.xpath("/html/body/nav/div/ul[2]/li/a")).click();

        wait.until(ExpectedConditions.invisibilityOfElementLocated(By.xpath("/html/body/nav/div/ul[1]/ul/li")));
        assertEquals("Logi sisse", driver.findElement(By.xpath("/html/body/nav/div/ul[2]/li/a")).getText());

    }

    @Test
    public void statistikaTest() {

        // "Statistika" link
        driver.findElement(By.xpath("/html/body/footer/div/div/div[2]/p[3]/a/strong")).click();
        driver.manage().timeouts().implicitlyWait(4, TimeUnit.SECONDS);

        assertEquals("Statistika - Päevakad", driver.getTitle());
        assertEquals(true, driver.findElement(By.xpath("/html/body")).getText().contains("Toite andmebaasis:"));

    }

    @Test
    public void linnaVahetamineTest() {


        driver.findElement(By.xpath("/html/body/label/span")).click();

        try {
            Thread.sleep(5000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        assertEquals(true, driver.getCurrentUrl().contains("Tallinn"));
        assertEquals(false, driver.getCurrentUrl().contains("Tartu"));

        driver.findElement(By.xpath("/html/body/label/span")).click();

        try {
            Thread.sleep(5000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        assertEquals(false, driver.getCurrentUrl().contains("Tallinn"));
        assertEquals(true, driver.getCurrentUrl().contains("Tartu"));

    }

    @Test
    public void valiKeelTest() {

        /* Siin muudetakse keelt vastavalt sellele, mis keel enne valitud oli
         * Pärast taastatakse algselt valitud keel (igaks juhuks)
         */
        Select keel = new Select(driver.findElement(By.xpath("//*[@id=\"lang\"]")));
        String endine = "";

        if (keel.getFirstSelectedOption().getText().equals("English")) {
            keel.selectByValue("est");
            driver.manage().timeouts().implicitlyWait(4, TimeUnit.SECONDS);
            assertEquals("Vali keel(?):", driver.findElement(By.xpath("//*[@id=\"form_lang\"]/p/label")).getText());
            endine = "eng";
        } else {
            keel.selectByValue("eng");
            driver.manage().timeouts().implicitlyWait(4, TimeUnit.SECONDS);
            assertEquals("Select language(?):", driver.findElement(By.xpath("//*[@id=\"form_lang\"]/p/label")).getText());
            keel.selectByValue("est");
            endine = "est";
        }

        keel = new Select(driver.findElement(By.xpath("//*[@id=\"lang\"]")));
        keel.selectByValue(endine);

    }

    @Test
    public void registreeruEmailOlemasTest() {

        // "Logi Sisse" nupp
        driver.findElement(By.xpath("/html/body/nav/div/ul[2]/li/a")).click();
        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form")));

        // "Registreeru" link
        driver.findElement(By.xpath("/html/body/div[4]/a[1]")).click();
        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form/div[8]/div/button")));

        // "E-mail" input väli
        driver.findElement(By.xpath("/html/body/form/div[5]/div/input")).sendKeys("m@h.l");
        // "Parool" input väli
        driver.findElement(By.xpath("/html/body/form/div[6]/div/input")).sendKeys("123");
        // "Parool uuesti" input väli
        driver.findElement(By.xpath("/html/body/form/div[7]/div/input")).sendKeys("123");
        // "Registreeru" nupp
        driver.findElement(By.xpath("/html/body/form/div[8]/div/button")).click();
        driver.manage().timeouts().implicitlyWait(4, TimeUnit.SECONDS);

        // See ebaõnnestub, sest selline kasutaja oli juba olemas (sama e-mailiga)
        assertEquals("parool või email ei sobinud", driver.findElement(By.xpath("/html/body")).getText());

    }

    @Test
    public void registreeruParoolidEiKattuTest() {

        // "Logi Sisse" nupp
        driver.findElement(By.xpath("/html/body/nav/div/ul[2]/li/a")).click();
        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form")));

        // "Registreeru" link
        driver.findElement(By.xpath("/html/body/div[4]/a[1]")).click();
        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form/div[8]/div/button")));

        // "E-mail" input väli
        driver.findElement(By.xpath("/html/body/form/div[5]/div/input")).sendKeys("m@h.l");
        // "Parool" input väli
        driver.findElement(By.xpath("/html/body/form/div[6]/div/input")).sendKeys("123");
        // "Parool uuesti" input väli
        driver.findElement(By.xpath("/html/body/form/div[7]/div/input")).sendKeys("132");
        // "Registreeru" nupp
        driver.findElement(By.xpath("/html/body/form/div[8]/div/button")).click();
        driver.manage().timeouts().implicitlyWait(4, TimeUnit.SECONDS);

        // See ebaõnnestub, sest sisestatud paroolid on erinevad
        assertEquals("parool või email ei sobinud", driver.findElement(By.xpath("/html/body")).getText());


    }

    @Test
    public void registreeruArikasutajaFunktsionaalsusTest() {
        // See test kontrollib ärikasutaja - tavakasutaja registreerimise vahel valimise võimalust

        // "Logi Sisse" nupp
        driver.findElement(By.xpath("/html/body/nav/div/ul[2]/li/a")).click();
        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form")));

        // "Registreeru" link
        driver.findElement(By.xpath("/html/body/div[4]/a[1]")).click();
        wait.until(ExpectedConditions.presenceOfElementLocated(By.xpath("/html/body/form/div[8]/div/button")));

        assertEquals("none", driver.findElement(By.xpath("//*[@id=\"business1\"]")).getCssValue("display"));
        assertEquals("none", driver.findElement(By.xpath("//*[@id=\"business2\"]")).getCssValue("display"));
        assertEquals("none", driver.findElement(By.xpath("//*[@id=\"business3\"]")).getCssValue("display"));

        // "Ärikasutaja" raadionupp
        driver.findElement(By.xpath("/html/body/form/div[1]/input[2]")).click();
        try {
            Thread.sleep(250);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        assertEquals("block", driver.findElement(By.xpath("//*[@id=\"business1\"]")).getCssValue("display"));
        assertEquals("block", driver.findElement(By.xpath("//*[@id=\"business2\"]")).getCssValue("display"));
        assertEquals("block", driver.findElement(By.xpath("//*[@id=\"business3\"]")).getCssValue("display"));

        // "Tavakasutaja" raadionupp
        driver.findElement(By.xpath("/html/body/form/div[1]/input[1]")).click();
        try {
            Thread.sleep(250);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        assertEquals("none", driver.findElement(By.xpath("//*[@id=\"business1\"]")).getCssValue("display"));
        assertEquals("none", driver.findElement(By.xpath("//*[@id=\"business2\"]")).getCssValue("display"));
        assertEquals("none", driver.findElement(By.xpath("//*[@id=\"business3\"]")).getCssValue("display"));

    }

}
