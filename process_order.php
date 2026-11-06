<?php

require "./order_functions.php";
$visitStamp = date('l, F j, Y g:i a');
setcookie('lastVisit', $visitStamp, time() + 86400, '/');
$orderSummary = order();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Chez Session</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>

   <main class="page">
      <div class="layout">
         <section class="card receipt">
            <h1>Receipt</h1>
            <div class="receipt-card"><?= $orderSummary; ?></div>
            <div class="actions">
               <a class="button primary" href="index.php">Order Again!</a>
            </div>
         </section>

         <aside class="insights">
            <div class="insight-card">
               <h2>Order feedback</h2>
               <p><?= htmlspecialchars(completionMessage()); ?></p>
               <p class="insight-note"><?= htmlspecialchars(pairingSuggestion()); ?></p>
            </div>

            <div class="insight-card pricing-grid">
               <div>
                  <h2>Estimated total</h2>
                  <p class="price-figure"><?= htmlspecialchars(formattedTotal()); ?></p>
               </div>
               <div>
                  <h2>Order profile</h2>
                  <p><?= htmlspecialchars(orderProfile()); ?></p>
               </div>
               <p class="insight-note full-width-note"><?= htmlspecialchars(pricingNote()); ?></p>
            </div>
         </aside>

      </div>
   </main>
</body>
</html>
