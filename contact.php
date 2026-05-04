<?php
$pageTitle = 'Contact';
$notice = '';
$recipientEmail = 'info@wbi.edu.lr';
$formData = [
	'name' => '',
	'email' => '',
	'phone' => '',
	'subject' => '',
	'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$formData['name'] = trim((string) ($_POST['name'] ?? ''));
	$formData['email'] = trim((string) ($_POST['email'] ?? ''));
	$formData['phone'] = trim((string) ($_POST['phone'] ?? ''));
	$formData['subject'] = trim((string) ($_POST['subject'] ?? ''));
	$formData['message'] = trim((string) ($_POST['message'] ?? ''));

	if ($formData['name'] === '' || $formData['email'] === '' || $formData['message'] === '') {
		$notice = 'Please complete your name, email, and message before sending.';
	} else {
		$emailSubject = trim($formData['subject']) !== '' ? $formData['subject'] : 'New Contact Message from WBI Website';
		$emailSubject = '[WBI Contact] ' . $emailSubject;
		$emailBody = implode("\n", [
			'New contact form submission from New Port Street High School website',
			'',
			'Name: ' . $formData['name'],
			'Email: ' . $formData['email'],
			'Phone: ' . ($formData['phone'] !== '' ? $formData['phone'] : 'N/A'),
			'Subject: ' . ($formData['subject'] !== '' ? $formData['subject'] : 'N/A'),
			'',
			'Message:',
			$formData['message'],
		]);

		$headers = [];
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-Type: text/plain; charset=UTF-8';
		$headers[] = 'From: WBI Website <' . $recipientEmail . '>';
		$headers[] = 'Reply-To: ' . $formData['name'] . ' <' . $formData['email'] . '>';
		$headers[] = 'X-Mailer: PHP/' . phpversion();

		$sent = @mail(
			$recipientEmail,
			$emailSubject,
			$emailBody,
			implode("\r\n", $headers)
		);

		if ($sent) {
			$notice = 'Thank you for contacting New Port Street High School. Your message has been sent successfully.';
			$formData = [
				'name' => '',
				'email' => '',
				'phone' => '',
				'subject' => '',
				'message' => '',
			];
		} else {
			$notice = 'Your message could not be sent right now. Please try again later or use the email link below.';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pageTitle; ?> - New Port Street High School</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/nps-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/nps-logo.png">
	<link rel="shortcut icon" href="assets/images/nps-logo.png">
	<link rel="manifest" href="manifest.json">
	<meta name="theme-color" content="#1E4FA3">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta name="apple-mobile-web-app-title" content="NPS">
	<link rel="apple-touch-icon" href="assets/images/nps-logo.png">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="contact-page">
	<?php include __DIR__ . '/includes/header.php'; ?>

	<main class="w-100 m-0">
		<section class="hero p-0 m-0" data-animate>
			<div class="hero-slide">
				<img src="assets/images/banner.png" alt="Contact New Port Street High School banner" class="hero-slide-image">
				<div class="hero-content container">
					<h1>Contact New Port Street High School</h1>
					<p>Reach our team for admissions, school records, general support, and partnership inquiries.</p>
					<div class="hero-buttons">
						<a href="#contact-form" class="btn primary">Send a Message</a>
						<a href="#contact-map" class="btn light">Find Us</a>
					</div>
				</div>
			</div>
		</section>

		<section class="stats-section py-5 text-center text-light" data-animate>
			<div class="container">
				<h2 class="text-white">Contact Overview</h2>
				<div class="row g-3 mt-3 justify-content-center">
					<div class="col-md-4"><div class="stat-card"><h3>New Port Street</h3><p>Monrovia, Liberia</p></div></div>
					<div class="col-md-4"><div class="stat-card"><h3>8 AM - 4 PM</h3><p>Monday - Friday Office Hours</p></div></div>
					<div class="col-md-4"><div class="stat-card"><h3>24/7</h3><p>Website Contact Access</p></div></div>
				</div>
			</div>
		</section>

		<section class="py-5" data-animate>
			<div class="container">
				<div class="section-heading">
					<span class="section-kicker">Contact New Port Street High School</span>
					<h1>Get in Touch</h1>
					<p>Our admissions and support team is ready to assist you with enrollment, records, and school information.</p>
				</div>
				<?php if ($notice !== ''): ?>
					<div class="alert <?php echo str_contains($notice, 'Thank you') ? 'alert-success' : 'alert-warning'; ?>">
						<?php echo htmlspecialchars($notice); ?>
					</div>
				<?php endif; ?>
				<div class="row g-4 align-items-stretch">
					<div class="col-lg-6" id="contact-form">
						<div class="admin-panel p-4 h-100 text-start">
							<div class="admin-panel-header">
								<div>
									<h2 class="admin-panel-title">Send a Message</h2>
									<p class="admin-panel-subtitle">Use this form for admissions, records, and general questions.</p>
								</div>
							</div>
							<form method="post" class="row g-3">
								<div class="col-md-6">
									<label class="form-label">Full Name</label>
									<input class="form-control" name="name" value="<?php echo htmlspecialchars($formData['name']); ?>" required>
								</div>
								<div class="col-md-6">
									<label class="form-label">Email Address</label>
									<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>" required>
								</div>
								<div class="col-md-6">
									<label class="form-label">Phone Number</label>
									<input class="form-control" name="phone" value="<?php echo htmlspecialchars($formData['phone']); ?>">
								</div>
								<div class="col-md-6">
									<label class="form-label">Subject</label>
									<input class="form-control" name="subject" value="<?php echo htmlspecialchars($formData['subject']); ?>">
								</div>
								<div class="col-12">
									<label class="form-label">Message</label>
									<textarea class="form-control" name="message" rows="6" required><?php echo htmlspecialchars($formData['message']); ?></textarea>
								</div>
								<div class="col-12 d-grid d-sm-flex gap-2">
									<button type="submit" class="btn btn-school">Send Message</button>
									<a href="tel:0777580532" class="btn btn-outline-secondary">Call Us</a>
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-6" id="contact-map">
						<div class="admin-panel p-4 h-100 text-start">
							<div class="admin-panel-header">
								<div>
									<h2 class="admin-panel-title">Find Our Location</h2>
									<p class="admin-panel-subtitle">Google Map showing New Port Street High School on New Port Street, Monrovia City.</p>
								</div>
							</div>
							<div class="ratio ratio-16x9 rounded-4 overflow-hidden border">
								<iframe
									src="https://www.google.com/maps?q=New%20Port%20Street%2C%20Monrovia%20City%2C%20Liberia&output=embed"
									style="border:0;"
									allowfullscreen=""
									loading="lazy"
									referrerpolicy="no-referrer-when-downgrade"
									title="New Port Street High School Location"
								></iframe>
							</div>
							<div class="mt-3">
								<p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>New Port Street, Monrovia City, Liberia</p>
								<p class="mb-2"><i class="bi bi-telephone-fill me-2"></i><a href="tel:0777580532">0777580532</a> / <a href="tel:0886543547">0886543547</a></p>
								<p class="mb-0"><i class="bi bi-envelope-fill me-2"></i><a href="mailto:info@newportwwmss.com">info@newportwwmss.com</a></p>
							</div>
						</div>
					</div>
				</div>

				<div class="row g-4 mt-1">
					<div class="col-md-3 col-6">
						<article class="card value-card-item text-start h-100">
							<h3><i class="bi bi-geo-alt-fill me-2"></i>Address</h3>
							<p class="mb-0">New Port Street, Monrovia City, Liberia</p>
						</article>
					</div>
					<div class="col-md-3 col-6">
						<article class="card value-card-item text-start h-100">
							<h3><i class="bi bi-telephone-fill me-2"></i>Phone</h3>
							<p class="mb-0"><a href="tel:0777580532">0777580532</a> / <a href="tel:0886543547">0886543547</a></p>
						</article>
					</div>
					<div class="col-md-3 col-6">
						<article class="card value-card-item text-start h-100">
							<h3><i class="bi bi-envelope-fill me-2"></i>Email</h3>
							<p class="mb-0"><a href="mailto:info@newportwwmss.com">info@newportwwmss.com</a></p>
						</article>
					</div>
					<div class="col-md-3 col-6">
						<article class="card value-card-item text-start h-100">
							<h3><i class="bi bi-clock-fill me-2"></i>Office Hours</h3>
							<p class="mb-0">Monday - Friday, 8:00 AM - 4:00 PM</p>
						</article>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
