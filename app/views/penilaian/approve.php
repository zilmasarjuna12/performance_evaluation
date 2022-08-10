<form class="form-penilaian" action="<?= BASEURL; ?>/penilaian/editWithApprove" method="POST">
  <div class="modal-header">
    <h4 class="modal-title" id="standard-modalLabel">Persetujuan penilaian</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-4">
          <div class="mb-4">
              <h5>Nama</h5>
              <p class="fullname"></p>
          </div>
      </div>
      <div class="col-md-4">
          <div class="mb-4">
              <h5>Email</h5>
              <p class="email"></p>
          </div>
      </div>
      <div class="col-md-4">
          <div class="mb-4">
              <h5>Pekerjaan</h5>
              <p class="job"></p>
          </div>
      </div>
    </div>


    <input type="hidden" name="id" id="id" >
    <input type="hidden" name="periode_id" id="periode_id" value="<?= $data['periode']['id'] ?>" >
    <input type="hidden" name="approved_by" id="approved_by" value="<?= Utils::GetUserId() ?>" >
    <ol class="list-group list-group-numbered">
      <li class="mb-2 d-flex justify-content-between">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Delivery</div>
          Pencapaian dalam segi selesai sebuah projek sesuai dengan target yang diberikan.
          <div class="mt-2">
            <div class="form-check">
                <input type="radio" id="delivery_time"  value="5" name="delivery_time" class="form-check-input">
                <label class="form-check-label" for="delivery_time">5</label>
            </div>
            <div class="form-check">
                <input type="radio" id="delivery_time" value="4" name="delivery_time" class="form-check-input">
                <label class="form-check-label" for="delivery_time">4</label>
            </div>
            <div class="form-check">
                <input type="radio" id="delivery_time" value="3" name="delivery_time" class="form-check-input">
                <label class="form-check-label" for="delivery_time">3</label>
            </div>
            <div class="form-check">
                <input type="radio" id="delivery_time" value="2"  name="delivery_time" class="form-check-input">
                <label class="form-check-label" for="delivery_time">2</label>
            </div>
            <div class="form-check">
                <input type="radio" id="delivery_time" value="1"  name="delivery_time" class="form-check-input">
                <label class="form-check-label" for="delivery_time">1</label>
            </div>
          </div>
          <div class="mt-2">
              <label>Bukti</label>
              <div class="download-delivery"></div>
          </div>
          <div class="mt-2">
            <div class="form-floating">
              <textarea class="form-control" name="delivery_time_comment" placeholder="Leave a comment here" id="delivery_comment" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Komentar</label>
            </div>
          </div>
        </div>
      </li>
      <li class="mb-2 d-flex justify-content-between">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Execution</div>
          Kemampuan menerapkan rencana yang dibuat secara efektif dengan memanfaatkan pendekatan tertentu, dan memiliki kemampuan memastikan penerapan tersebut dijalankan sebagaimana mestinya untuk mencapai tujuan yang telah ditetapkan. 
          <div class="mt-2">
            <div class="form-check">
                <input type="radio" id="execution"  value="5" name="execution" class="form-check-input">
                <label class="form-check-label" for="execution">5</label>
            </div>
            <div class="form-check">
                <input type="radio" id="execution" value="4" name="execution" class="form-check-input">
                <label class="form-check-label" for="execution2">4</label>
            </div>
            <div class="form-check">
                <input type="radio" id="execution" value="3" name="execution" class="form-check-input">
                <label class="form-check-label" for="execution">3</label>
            </div>
            <div class="form-check">
                <input type="radio" id="execution" value="2"  name="execution" class="form-check-input">
                <label class="form-check-label" for="execution">2</label>
            </div>
            <div class="form-check">
                <input type="radio" id="execution" value="1"  name="execution" class="form-check-input">
                <label class="form-check-label" for="customRadio2">1</label>
            </div>
          </div> 
          <div class="mt-2">
              <label>Bukti</label>
              <div class="download-execution"></div>
          </div>
          <div class="mt-2">
            <div class="form-floating">
              <textarea class="form-control" name="execution_comment" placeholder="Leave a comment here" id="execution_comment" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Komentar</label>
            </div>
          </div>
        </div>
      </li>
      <li class="mb-2 d-flex justify-content-between">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Teamwork</div>
          Kemampuan menjalin, membina, mempertahankan hubungan kerja yang efektif, memiliki komitmen saling membantu dalam penyelesaian tugas, dan mengoptimalkan segala sumberdaya yang tersedia untuk mencapai hasil bersama. 
          <div class="mt-2">
            <div class="form-check">
                <input type="radio" id="team_work"  value="5" name="team_work" class="form-check-input">
                <label class="form-check-label" for="team_work">5</label>
            </div>
            <div class="form-check">
                <input type="radio" id="team_work" value="4" name="team_work" class="form-check-input">
                <label class="form-check-label" for="team_work2">4</label>
            </div>
            <div class="form-check">
                <input type="radio" id="team_work" value="3" name="team_work" class="form-check-input">
                <label class="form-check-label" for="team_work">3</label>
            </div>
            <div class="form-check">
                <input type="radio" id="team_work" value="2"  name="team_work" class="form-check-input">
                <label class="form-check-label" for="team_work">2</label>
            </div>
            <div class="form-check">
                <input type="radio" id="team_work" value="1"  name="team_work" class="form-check-input">
                <label class="form-check-label" for="customRadio2">1</label>
            </div>
          </div> 
          <div class="mt-2">
            <div class="form-floating">
              <textarea class="form-control" name="team_work_comment" placeholder="Leave a comment here" id="team_work_comment" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Komentar</label>
            </div>
          </div>
        </div>
      </li>
      <li class="mb-2 d-flex justify-content-between">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Innovation</div>
          Kemampuan untuk menemukan/membuat solusi alternatif dengan cara yang baru, berbeda, dan orisinil untuk melaksanakan tugas secara efektif dan efisien dalam meningkatkan kinerja dan mencapai tujuan bersama. 
          <div class="mt-2">
            <div class="form-check">
                <input type="radio" id="innovation"  value="5" name="innovation" class="form-check-input">
                <label class="form-check-label" for="innovation">5</label>
            </div>
            <div class="form-check">
                <input type="radio" id="innovation" value="4" name="innovation" class="form-check-input">
                <label class="form-check-label" for="innovation2">4</label>
            </div>
            <div class="form-check">
                <input type="radio" id="innovation" value="3" name="innovation" class="form-check-input">
                <label class="form-check-label" for="innovation">3</label>
            </div>
            <div class="form-check">
                <input type="radio" id="innovation" value="2"  name="innovation" class="form-check-input">
                <label class="form-check-label" for="innovation">2</label>
            </div>
            <div class="form-check">
                <input type="radio" id="innovation" value="1"  name="innovation" class="form-check-input">
                <label class="form-check-label" for="customRadio2">1</label>
            </div>
          </div> 
          <div class="mt-2">
            <div class="form-floating">
              <textarea class="form-control" name="innovation_comment" placeholder="Leave a comment here" id="innovation_comment" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Komentar</label>
            </div>
          </div>
        </div>
      </li>
    </ol>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit">Setujui</button>
  </div>
</form>