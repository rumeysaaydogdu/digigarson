<!-- ======= Contact Section ======= -->
<section id="contact" class="contact navbarstatu yumos-1 page-color">
    <div class="container heightt" data-aos="fade-up">

        <div class="section-title">
            <h2 lang="tr">Restoran Başvurusu</h2>
            <p>Bize ulaşın. Ürün ve hizmetlerimizin avantajlarını anlatmaktan mutluluk duyacağız.</p>
        </div>

        <div class="row">

            <div class="col-lg-7 d-flex align-items-stretch" style="    margin: auto;">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Adınız</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surname">Soyadınız</label>
                            <input type="text" name="surname" class="form-control" id="surname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="companyname">Restoran Adı</label>
                        <input type="text" class="form-control" name="companyname" id="companyname" required>
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefon Numarası</label>
                        <input type="tel" class="form-control" name="tel" id="tel" minlength="9" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mail</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="taxno">Vergi Numarası</label>
                        <input type="text" class="form-control" name="taxno" id="taxno" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <textarea class="form-control" name="address" id="address" rows="10" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Yükleniyor</div>
                        <div class="error-message">Mesaj gönderme başarısız.</div>
                        <div class="sent-message">Mesaj gönderildi. Teşekkürler!</div>
                    </div>
                    <div class="text-center"><button type="submit">Mesaj Gönder</button></div>
                </form>
            </div>

        </div>

    </div>
</section>

<!-- End Contact Section -->