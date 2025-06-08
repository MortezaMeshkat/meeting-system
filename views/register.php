<main>
  <h1>REGISTER</h1>

  <form action="<?= APP_URL ?>/register" method="POST">
    <input type="text" name="name" placeholder="name" />
    <input type="email" name="email" placeholder="email" />
    <input type="password" name="password" placeholder="password" />
    <fieldset>
      <legend>Role</legend>
      <label for="doctor">
        <input id="doctor" type="radio" name="role_id" value="1" checked>
        Doctor
      </label>
      <label for="patient">
        <input type="radio" id="patient" name="role_id" value="2">
        Patient
      </label>
    </fieldset>
    <button type="submit">REGISTER</button>
  </form>
</main>