<?php
require "./order_functions.php";

$welcomeBack = '';
if (isset($_COOKIE['lastVisit'])) {
   $last = htmlspecialchars($_COOKIE['lastVisit']);
   $welcomeBack = "Welcome back! Your last visit was {$last}.";
} else {
   $welcomeBack = 'First time at Chez Session? Welcome in!';
}
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
      <p class="welcome-note"><?= $welcomeBack ?></p>

      <div class="layout">
         <form class="card order-form" action="process_order.php" method="post">
            <h1>Build your order</h1>

            <div class="field">
               <label for="dessert">Dessert</label>
               <select id="dessert" name="dessert">
                  <option value="none">(choose a dessert)</option>
                  <option value="Cheesecake" <?= dessertSelected("Cheesecake"); ?>>Cheesecake</option>
                  <option value="Chocolate Cake" <?= dessertSelected("Chocolate Cake"); ?>>Chocolate Cake</option>
                  <option value="Carrot Cake" <?= dessertSelected("Carrot Cake"); ?>>Carrot Cake</option>
                  <option value="Tiramisu" <?= dessertSelected("Tiramisu"); ?>>Tiramisu</option>
               </select>
            </div>

            <div class="field">
               <label for="drink">Drink</label>
               <select id="drink" name="drink">
                  <option value="none">(choose a drink)</option>
                  <option value="Coffee" <?= drinkSelected("Coffee"); ?>>Coffee</option>
                  <option value="Hot Chocolate" <?= drinkSelected("Hot Chocolate"); ?>>Hot Chocolate</option>
                  <option value="Root Beer" <?= drinkSelected("Root Beer"); ?>>Root Beer</option>
                  <option value="Tea" <?= drinkSelected("Tea"); ?>>Tea</option>
                  <option value="Milk" <?= drinkSelected("Milk"); ?>>Milk</option>
               </select>
            </div>

            <fieldset class="field size-field">
               <legend>Drink size</legend>
               <div class="size-options">
                  <label class="size-option">
                     <input type="radio" name="drinkSize" value="Small" <?= drinkSizeSelected("Small"); ?>>
                     Small
                  </label>
                  <label class="size-option">
                     <input type="radio" name="drinkSize" value="Medium" <?= drinkSizeSelected("Medium"); ?>>
                     Medium
                  </label>
                  <label class="size-option">
                     <input type="radio" name="drinkSize" value="Large" <?= drinkSizeSelected("Large"); ?>>
                     Large
                  </label>
               </div>
            </fieldset>

            <div class="actions">
               <button type="submit" class="button primary">Send to Kitchen</button>
               <a class="button secondary" href="forget_order.php">Forget Order</a>
            </div>
         </form>

         <aside class="insights">
            <div class="insight-card">
               <h2>Live guidance</h2>
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
            </div>
         </aside>
      </div>
   </main>
</body>
</html>
