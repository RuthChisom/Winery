<?php include("server/dh-config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>FAQ | <?php echo $config['title'] ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
  </head>

  <body>
    <!-- header-section -->
        <?php include('header.php') ?>

      <!-- Faq starts -->
      <div class="container">
        <div class="row">
          <div class="faq-wrapper">
            <div class="header1">
              <h1>FAQs</h1>
            </div>
            <div class="faq-inner">
              <div class="faq-item">
                <h3>
                  If I don't find the answer to my question here, how can I find help?
                  
                </h3>
                <div class="faq-body">
                If you can't find the answer to your question here, please contact Customer Services by email on info@drinkshub.com or call on 0113 365 1000 (office hours 9.00am - 5.30pm, Monday - Friday).
                </div>
              </div>
              <hr>
              <div class="faq-item">
                <h3>
                  Can I shop at DrinksHub without logging in or registering?
                
                </h3>
                <div class="faq-body">
                  Yes. You can purchase on the  website as a Guest - no login required. However if you register an account, you can view past orders, download invoices, create a favorites list, save addresses in your address book and experience a much more streamlined checkout experience. At DrinksHub, we endeavour to make the purchase experience as simple and user-friendly as possible
                </div>
              </div>
              <hr>
              <div class="faq-item">
                <h3>
                  Does DrinksHub deliver on Weekends?
                  
                </h3>
                <div class="faq-body">
                  Yes, we deliver on both Saturdays and Sundays
                </div>
              </div>
              <hr>
              <div class="faq-item">
                <h3>
                  Can I pay using my American Express card?
                
                </h3>
                <div class="faq-body">
                  The DrinksHub website does not currently accept payment by American Express. Orders can be paid using the following card types: Visa, Mastercard, Maestro. You can also pay by bank transfer.
                </div>
              </div>
              <hr>
              <div class="faq-item">
                <h3>
                 Is it safe to give my credit/debit card details online?
                  
                </h3>
                <div class="faq-body">
                  Your order and transaction details are encrypted using 256-bit SSL (Secure Socket Layer) technology. Encrypting private information ensures your order details are transmitted safely and securely through the Internet. We hold a DigiCert Inc SSL Security Certificate. DigiCert Inc is a market leading provider for SSL security certificates.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <br/>

      <!-- faq section ends -->

      <!-- footer -->
      <?php include('footer.html') ?>
      
  </body>
</html>