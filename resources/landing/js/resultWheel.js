// Was an inline <script type="module"> in result.html
import { initNewLifeWheel } from './newLifeWheel.js';
document.addEventListener('DOMContentLoaded', () => {
  initNewLifeWheel({ isResultPage: true });
});
