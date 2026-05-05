<?php include_once __DIR__ . '/site_contact.php'; ?>

<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-block footer-about">
      <div class="footer-brand">
        <img src="assets/images/nps-logo.png" alt="<?php echo htmlspecialchars(NPS_SCHOOL_NAME); ?> Logo" class="footer-logo">
        <div>
          <h3 class="mb-1"><?php echo htmlspecialchars(NPS_SCHOOL_NAME); ?></h3>
          <p class="footer-subtitle mb-0">World Wide Mission School System</p>
        </div>
      </div>
      <p class="footer-brief">
        <?php echo htmlspecialchars(NPS_SCHOOL_NAME); ?> is a faith-based school committed to academic excellence,
        character formation, and leadership development. 
      </p>
      <p class="mb-0"><i class="bi bi-geo-alt-fill me-1" aria-hidden="true"></i> <?php echo htmlspecialchars(NPS_SCHOOL_ADDRESS); ?></p>
    </div>

    <div class="footer-block">
      <h3>Quick Links</h3>
      <ul class="footer-links">
        <li><a href="about.php">About</a></li>
        <li><a href="admissions.php">Admissions</a></li>
        <li><a href="careers.php">Careers</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="admin-login.php">Admin</a></li>
      </ul>
    </div>

    <div class="footer-block">
      <h3>Connect</h3>
      <p><a href="<?php echo htmlspecialchars(NPS_PORTAL_URL); ?>">Student E-Portal</a></p>
      <p>Email: <a href="mailto:<?php echo htmlspecialchars(NPS_CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(NPS_CONTACT_EMAIL); ?></a></p>
      <p>Phone: <a href="tel:<?php echo htmlspecialchars(NPS_CONTACT_PHONE_PRIMARY); ?>"><?php echo htmlspecialchars(NPS_CONTACT_PHONE_PRIMARY); ?></a> / <a href="tel:<?php echo htmlspecialchars(NPS_CONTACT_PHONE_SECONDARY); ?>"><?php echo htmlspecialchars(NPS_CONTACT_PHONE_SECONDARY); ?></a></p>
      <p>Office Hours: Mon - Fri, 8:00 AM - 4:00 PM</p>
      <div class="footer-socials" aria-label="Social media links">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook" title="Facebook">
          <i class="bi bi-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram" title="Instagram">
          <i class="bi bi-instagram" aria-hidden="true"></i>
        </a>
        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube" title="YouTube">
          <i class="bi bi-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="container copyright-row">
    <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(NPS_SCHOOL_NAME); ?>. All rights reserved.</p>
    <p class="developer-credit">Developed by <a href="https://www.tecliberia.com" target="_blank" rel="noopener noreferrer">Tec Liberia Group</a></p>
  </div>
</footer>

<div class="floating-actions" aria-label="Quick actions">
  <a
    class="floating-action-btn floating-action-whatsapp"
    href="https://wa.me/<?php echo rawurlencode(NPS_CONTACT_WHATSAPP_INTL); ?>?text=Hello%20NPS%2C%20I%20need%20more%20information%20about%20admission."
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Chat with NPS on WhatsApp"
    title="Chat on WhatsApp"
  >
    <i class="bi bi-whatsapp" aria-hidden="true"></i>
  </a>
  <a
    class="floating-action-btn floating-action-call"
    href="tel:<?php echo htmlspecialchars(NPS_CONTACT_PHONE_PRIMARY); ?>"
    aria-label="Call NPS"
    title="Call NPS"
  >
    <i class="bi bi-telephone-fill" aria-hidden="true"></i>
  </a>
  <button
    type="button"
    class="floating-action-btn floating-action-top"
    id="backToTopBtn"
    aria-label="Back to top"
    title="Back to top"
  >
    <i class="bi bi-arrow-up" aria-hidden="true"></i>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
