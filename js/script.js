const bookNowBtn = document.getElementById('bookNowBtn');
const modal = document.getElementById('modal');
const closeBtn = document.getElementsByClassName('close')[0];

// Show modal
bookNowBtn.addEventListener('click', function() {
  modal.style.display = 'block';
});

// Close modal
closeBtn.addEventListener('click', function() {
  modal.style.display = 'none';
});

// Close modal when clicking outside the modal content
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});

// استهلال النصوص الثابتة
const appetizersCard = document.getElementById('appetizers-card');
const saladsCard = document.getElementById('salads-card');
const mainDishesCard = document.getElementById('main-dishes-card');
const beveragesCard = document.getElementById('beverages-card');
const dessertsCard = document.getElementById('desserts-card');
const menuCards = document.getElementsByClassName('menu-card');

// إضافة مستمع الحدث للروابط في القائمة
const menuLinks = document.querySelectorAll('.menu a');
menuLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); // إلغاء سلوك الافتراضي للرابط

    // إخفاء جميع بطاقات القائمة
    for (let i = 0; i < menuCards.length; i++) {
      menuCards[i].style.display = 'none';
    }

    // استهداف بطاقة القائمة المطلوبة بواسطة الرابط المنقر
    const targetCardId = link.getAttribute('href');
    const targetCard = document.querySelector(targetCardId);

    // إظهار بطاقة القائمة المستهدفة
    if (targetCard) {
      targetCard.style.display = 'grid'; // استخدام خاصية الشبكة
      targetCard.style.gridTemplateColumns = 'repeat(4, 1fr)'; // تعيين تخطيط الشبكة 3-4
      targetCard.style.direction = 'rtl'; // تغيير الاتجاه إلى اليمين لليسار
      targetCard.parentNode.style.display = 'grid';
      targetCard.parentNode.style.gridTemplateColumns = 'repeat(4, 1fr)'; // تعيين تخطيط الشبكة 3-4
      targetCard.parentNode.style.direction = 'rtl'; // تغيير الاتجاه إلى اليمين لليسار
    }
  });
});


