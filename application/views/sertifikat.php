<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-header card-header-icon" data-background-color="rose">
              <i class="material-icons">recent_actors</i>
            </div>
          </div>
          <div class="card-content">
            <h4 class="card-title"><?= $title ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php foreach ($eventku as $e) : ?>
    <?php if ($e['status_hadir'] == 1) : ?>
      <?php
      $absensi = $this->db->where('id_user=', $user['id_user']);
      $absensi = $this->db->where('id_event=', $e['id_event']);
      $absensi = $this->db->get('absensi');
      ?>
      <?php if ($absensi->num_rows() == 1) : ?>
        <?php
        $namaevent = $this->db->where('id_event =', $e['id_event']);
        $namaevent = $this->db->get('event')->row_array();
        // echo '<pre>';
        // print_r($menu);
        ?>
        <div class="col-md-3">
          <div class="card card-product">
            <a href="<?= base_url('eventku/detailsertifikat/') . $this->encryptor->enkrip('enkrip',$e['id_event']) ?>">
              <div class="card-image" data-header-animation="true">
                <img class="img" src="<?= base_url('assets/image/event/') . $namaevent['image']; ?>">
              </div>
            </a>
            <div class="card-content">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <a href="<?= base_url('eventku/detailsertifikat/') . $this->encryptor->enkrip('enkrip',$e['id_event']) ?>"
                 class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View Certificate">
                <span class="material-icons">card_giftcard</span>
                </a>
              </div>
              <h4 class="card-title">
                <a href="<?= base_url('eventku/detailsertifikat/') . $this->encryptor->enkrip('enkrip',$e['id_event']) ?>"><?= $namaevent['nama_event']; ?></a>
              </h4>
              <div class="card-description">
                <?= word_limiter($namaevent['keterangan'], 20); ?>
              </div>
              <div class="card-description">
                Media Event : <?= $namaevent['media_event'] ?>
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <?php
                $penyelenggara = $this->db->where('id_user =', $namaevent['id_penyelenggara']);
                $penyelenggara = $this->db->get('user')->row_array();
                ?>
                <h4><?= $penyelenggara['username'] ?></h4>
              </div>
              <div class="stats pull-right">
                <?php
                $query = $this->db->where('id_event =', $e['id_event']);
                $query = $this->db->get('event_participant');
                if ($query->num_rows() > 0) {
                  $jumlah = $query->num_rows();
                } else {
                  $jumlah =  0;
                }
                ?>
                <p class="category"><i class="material-icons">user</i>Peserta Event : <?= $jumlah ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php else : ?>
      <?php endif; ?>
    <?php else : ?>
    <?php endif; ?>
  <?php endforeach; ?>
</div>