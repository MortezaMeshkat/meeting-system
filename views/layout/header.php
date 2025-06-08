<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $title ?>
  </title>
  <link rel="stylesheet" href="<?= APP_URL ?>/public/css/pico.min.css" />
</head>

<body class="container">

  <header>
    <nav>
      <ul>
        <li><a href="<?= APP_URL ?>/home"><strong>MEETING SYSTEM</strong></a></li>
      </ul>
      <ul>
        <?php if (!isset($_SESSION['user_id'])) { ?>
          <li>
            <a href="<?= APP_URL ?>/register">register</a>
          </li>
          <li>
            <a href="<?= APP_URL ?>/login">login</a>
          </li>
        <?php } else { ?>
          <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) { ?>
            <li>
              <a href="<?= APP_URL ?>/meetings/new">new meeting</a>
            </li>
            <li>
              <a href="<?= APP_URL ?>/meetings/report">report</a>
            </li>
          <?php } else if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2) { ?>
              <li>
                <a href="<?= APP_URL ?>/meetings">meetings</a>
              </li>
            <?php } ?>
          <li>
            <form action="<?= APP_URL ?>/logout" method="POST">
              <button type="submit">logout</button>
            </form>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </header>