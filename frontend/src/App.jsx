import { useEffect, useState } from "react";
import api from "./api/axios";

function App() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    api.get("/utilisateurs")
      .then((res) => setUsers(res.data))
      .catch((err) => console.error(err));
  }, []);

  return (
    <div className="p-6">
      <h1 className="text-xl font-bold">Liste des utilisateurs</h1>
      <ul>
        {users.map((u) => (
          <li key={u.id}>
            {u.prenom} {u.nom} - {u.email}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
