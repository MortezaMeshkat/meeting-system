<main>
  <h1>NEW MEETING</h1>

  <div class="grid" style="display: flex; column-gap: 4rem;">
    <form style="flex: 1; margin-bottom: 0;" action="<?= APP_URL ?>/meetings/new" method="POST">
      <label for="date">Date
        <input id="date" type="date" name="date">
      </label>
      <label for="time">Time
        <input id="time" type="number" min="8" max="20" name="time">
      </label>
      <label for="price">Price
        <input id="price" type="number" step="0.001" name="price">
      </label>
      <button type="submit">CREATE</button>
    </form>
    <img style="flex: 1; border-radius: 8px; object-fit: cover;" src="<?= APP_URL ?>/public/images/meeting.webp"
      alt="doctor meeting with patient" />
  </div>
</main>