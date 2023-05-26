'use strict';

// document Query Selector by class in the menu
window.onload = () => {
  const mpuActivation = document.querySelector('.mpu-activation');
  const mpuVisuel = document.querySelector('.mpu-visuel');
  const mpuConditions = document.querySelector('.mpu-conditions');
  const mpuOptionsSupp = document.querySelector('.mpu-options-supp');

  // Add Event Listener to the menu in order to display the right div

  function menuDisplay() {
    mpuActivation.addEventListener('click', function () {
      displayDiv('activation');
      removeActiveClass(mpuActivation);
      mpuActivation.classList.add('is-active');
    });

    mpuVisuel.addEventListener('click', function () {
      displayDiv('visuel');
      removeActiveClass(mpuVisuel);
      mpuVisuel.classList.add('is-active');
    });

    mpuConditions.addEventListener('click', function () {
      displayDiv('conditions');
      removeActiveClass(mpuConditions);
      mpuConditions.classList.add('is-active');
    });

    mpuOptionsSupp.addEventListener('click', function () {
      displayDiv('options supp');
      removeActiveClass(mpuOptionsSupp);
      mpuOptionsSupp.classList.add('is-active');
    });
  }

  // Switch case to display the right div if the user clicks on the menu
  function displayDiv(menuItem) {
    switch (menuItem) {
      case 'activation':
        console.log('activation');
        // document.querySelector('.mpu-activation').style.display = 'block';

        break;
      case 'visuel':
        console.log('visuel');
        // document.querySelector('.mpu-visuel').style.display = 'block';
        break;
      case 'conditions':
        console.log('conditions');
        // document.querySelector('.mpu-conditions').style.display = 'block';
        break;
      case 'options supp':
        console.log('options supp');
        // document.querySelector('.mpu-options-supp').style.display = 'block';
        break;
      default:
        break;
    }
  }

  // Remove 'is-active' class from the specified button
  function removeActiveClass(button) {
    const menuButtons = document.querySelectorAll('.tabs ul li');
    menuButtons.forEach((btn) => {
      if (btn !== button.parentNode) {
        btn.classList.remove('is-active');
      }
    });
    button.parentNode.classList.add('is-active');
  }

  menuDisplay();
};
