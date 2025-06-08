<main>
  <h1>MEETINGS REPORT</h1>

  <div class="grid" style="grid-template-columns: 50% 50%; grid-column-gap: 3rem; grid-row-gap: 3rem">
    <?php foreach ($data['meetings'] as $meeting) { ?>
      <div>
        <div>
          <p style="display: inline">📅
            <?= $meeting['date'] ?>
          </p>
          <p style="display: inline; margin-left: 1rem">⏲️
            <?= $meeting['time'] ?>:00
          </p>
        </div>
        <br />
        <p>💳 $
          <?= $meeting['price'] ?>
        </p>
        <?php if (isset($meeting['patient_id'])) { ?>
          <p><strong>BOOKED</strong></p>
        <?php } else { ?>
          <p><strong>AVAILABLE</strong></p>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</main>