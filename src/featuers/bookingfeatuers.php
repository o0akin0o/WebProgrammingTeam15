
<body>
    <h1>Thank You!</h1>
    <p>Your order has been placed.</p>
    

    <h2>Rate your experience</h2>
    <form action="process_feedback.php" method="post">
        <label for="delivery_satisfaction">How satisfied were you with delivery options available in the checkout?</label><br>
        <select name="delivery_satisfaction" id="delivery_satisfaction">
            <option value="5">Very satisfied</option>
            <option value="4">Satisfied</option>
            <option value="3">Neutral</option>
            <option value="2">Dissatisfied</option>
            <option value="1">Very dissatisfied</option>
        </select><br><br>
        <input type="submit" value="Submit Feedback">
    </form>

    
