'use strict';

document.addEventListener('DOMContentLoaded', function (event) {
  const mpuActivation = document.querySelector('.mpu-activation');
  const mpuVisuel = document.querySelector('.mpu-visuel');
  const mpuConditions = document.querySelector('.mpu-conditions');
  const mpuOptionsSupp = document.querySelector('.mpu-options-supp');
  const mpuActivationSection = document.querySelector(
    '.mpu-activation-section'
  );
  const mpuVisuelSection = document.querySelector('.mpu-visuel-section');
  const mpuConditionsSection = document.querySelector(
    '.mpu-conditions-section'
  );
  const mpuOptionsSuppSection = document.querySelector(
    '.mpu-options-supp-section'
  );

  //hide all divs except the first one
  function initAdminOptions() {
    mpuVisuelSection.style.display = 'none';
    mpuConditionsSection.style.display = 'none';
    mpuOptionsSuppSection.style.display = 'none';
  }
  initAdminOptions();

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
        mpuActivationSection.style.display = 'block';
        mpuVisuelSection.style.display = 'none';
        mpuConditionsSection.style.display = 'none';
        mpuOptionsSuppSection.style.display = 'none';
        break;
      case 'visuel':
        console.log('visuel');
        mpuActivationSection.style.display = 'none';
        mpuVisuelSection.style.display = 'block';
        mpuConditionsSection.style.display = 'none';
        mpuOptionsSuppSection.style.display = 'none';
        break;
      case 'conditions':
        console.log('conditions');
        mpuActivationSection.style.display = 'none';
        mpuVisuelSection.style.display = 'none';
        mpuConditionsSection.style.display = 'block';
        mpuOptionsSuppSection.style.display = 'none';
        break;
      case 'options supp':
        console.log('options supp');
        mpuActivationSection.style.display = 'none';
        mpuVisuelSection.style.display = 'none';
        mpuConditionsSection.style.display = 'none';
        mpuOptionsSuppSection.style.display = 'block';
        break;
      default:
        console.log('default');
        mpuActivationSection.style.display = 'block';
        mpuVisuelSection.style.display = 'none';
        mpuConditionsSection.style.display = 'none';
        mpuOptionsSuppSection.style.display = 'none';
        break;
    }
  }

  // Remove 'is-active' class from the specified button and add is-active class
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
});
