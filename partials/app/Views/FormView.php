<form id="addForm" action="./?action=add" method="POST">
    <label for="name">Imię i nazwisko:</label>
    <input type="text" id="name" name="name" required>

    <label for="username">Nazwa użytkownika:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="street">Ulica:</label>
    <input type="text" id="street" name="street" required>

    <label for="city">Miasto:</label>
    <input type="text" id="city" name="city" required>

    <label for="zipcode">Kod pocztowy:</label>
    <input type="text" id="zipcode" name="zipcode" required>

    <label for="phone">Telefon:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="company_name">Nazwa firmy:</label>
    <input type="text" id="company_name" name="company_name" required>

    <input type="submit" value="Dodaj" class="btn-submit">
</form>