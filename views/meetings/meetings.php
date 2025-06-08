<main>
  <h1>MEETINGS</h1>

  <div class="grid" style="grid-template-columns: 48% 48%; grid-column-gap: 3rem; grid-row-gap: 1.5rem">
    <?php foreach ($data['meetings'] as $meeting) { ?>
      <div>
        <h4>Dr.
          <?= $meeting['name'] ?>
        </h4>

        <div>
          <p style="display: inline">📅
            <?= $meeting['date'] ?>
          </p>
          <p style="display: inline; margin-left: 1rem">⏲️
            <?= $meeting['time'] ?>
          </p>
        </div>
        <br />
        <p><strong>💳 $
            <?= $meeting['price'] ?>
          </strong></p>
        <form action="<?= APP_URL . '/meetings/book/' . $meeting['meeting_id'] ?>" method="POST">
          <input type="hidden" name="user_meeting_id" value="<?= $meeting['user_meeting_id'] ?>">
          <input type="hidden" name="date" value="<?= $meeting['date'] ?>" />
          <input type="hidden" name="time" value="<?= $meeting['time'] ?>" />
          <button type="submit">BOOK</button>
        </form>
      </div>
    <?php } ?>
  </div>
</main>