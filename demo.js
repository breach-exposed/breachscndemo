// demo.js

// 1. Hard-coded password (insecure!)
const HARD_CODED_PASSWORD = "";

// 2. Simple authentication function
function authenticate(username, password) {
  if (password === HARD_CODED_PASSWORD) {
    console.log(`✅ User "${username}" authenticated successfully.`);
    return true;
  } else {
    console.log(`❌ Authentication failed for "${username}".`);
    return false;
  }
}

// 3. Demo calls
authenticate("alice", "");  // ✅ success
authenticate("bob",   "");       // ❌ failure
