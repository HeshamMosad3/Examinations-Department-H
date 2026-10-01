// Saves a finished wheel-of-life test in the database (signed-in users only; guests keep it in the browser).

const isComplete = (a) =>
  Array.isArray(a) && a.length === 8 &&
  a.every((row) => Array.isArray(row) && row.length === 10 && row.every((v) => Number.isInteger(v) && v >= 0 && v <= 4));

/** Answers of the last finished test kept by the landing test (null when missing or incomplete). */
export function readStoredAnswers() {
  try {
    const answers = JSON.parse(localStorage.getItem('lwAnswers'));
    return isComplete(answers) ? answers : null;
  } catch {
    return null;
  }
}

const hash = (answers) => {
  const text = JSON.stringify(answers);
  let h = 0;
  for (let i = 0; i < text.length; i++) h = (h * 31 + text.charCodeAt(i)) | 0;
  return String(h);
};
const syncedKey = (userId) => `lwSynced:${userId}`;

/** True when these exact answers were already saved for this user from this browser. */
export function isAlreadySaved(userId, answers) {
  try {
    return localStorage.getItem(syncedKey(userId)) === hash(answers);
  } catch {
    return false;
  }
}

/** POSTs the answers; resolves with the server's JSON ({ ok, user_id, redirect }) or null when saving failed. */
export async function saveLifeWheelAnswers(url, answers) {
  try {
    const response = await fetch(url, {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
      },
      body: JSON.stringify({ answers }),
    });
    if (!response.ok) return null;

    const data = await response.json();
    try {
      if (data?.user_id) localStorage.setItem(syncedKey(data.user_id), hash(answers));
    } catch { /* storage unavailable: the server de-duplicates identical answers anyway */ }

    return data;
  } catch {
    return null;
  }
}
