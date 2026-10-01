import { initNavigation } from './navigation.js';
import { isAlreadySaved, readStoredAnswers, saveLifeWheelAnswers } from './lifeWheelSave.js';

initNavigation();

// A visitor who finished the test as a guest and signed in afterwards still has the answers in this browser:
// save them to the account once, then reload so the page is built from the saved result.
async function saveStoredAnswers() {
  const main = document.getElementById('main-content');
  const saveUrl = main?.dataset.saveUrl;
  const userId = main?.dataset.userId;
  const answers = readStoredAnswers();
  if (!saveUrl || !userId || !answers || isAlreadySaved(userId, answers)) return;

  const saved = await saveLifeWheelAnswers(saveUrl, answers);
  if (saved?.ok) window.location.reload();
}

saveStoredAnswers();

// Aspect cards: swap between the Figma "Default" and "Expand" variants of each card.
function setExpanded(card, expanded) {
  const collapsedEl = card.querySelector('[data-aspect-default]');
  const expandedEl = card.querySelector('[data-aspect-expanded]');
  if (!collapsedEl || !expandedEl) return;

  collapsedEl.hidden = expanded;
  expandedEl.hidden = !expanded;

  // Keep keyboard focus on the equivalent toggle of the variant that just became visible.
  const next = (expanded ? expandedEl : collapsedEl).querySelector('[data-aspect-toggle]');
  if (next && card.contains(document.activeElement)) next.focus();
}

document.addEventListener('click', (event) => {
  const toggle = event.target.closest('[data-aspect-toggle]');
  if (!toggle) return;
  const card = toggle.closest('[data-aspect]');
  if (card) setExpanded(card, toggle.dataset.aspectToggle === 'expand');
});
