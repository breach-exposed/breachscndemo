// demo.js

// 1. Hard-coded password (insecure!)
const HARD_CODED_PASSWORD = "P@ssw0rd123!";

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
authenticate("alice", "P@ssw0rd123!");  // ✅ success
authenticate("bob",   "letmein");       // ❌ failure
