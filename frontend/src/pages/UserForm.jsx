import { useState } from "react";
import api from "../api/axios";

export default function UserForm() {
  const [form, setForm] = useState({
    prenom: "",
    nom: "",
    sexe: "",
    adresse: "",
    ville: "",
    pays: "",
    telephone: "",
    email: "",
  });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await api.post("/utilisateur", form);
      alert("✅ Utilisateur ajouté !");
      setForm({
        prenom: "",
        nom: "",
        sexe: "",
        adresse: "",
        ville: "",
        pays: "",
        telephone: "",
        email: "",
      }); // reset form après succès
    } catch (err) {
      console.error("Erreur API:", err);
      alert("❌ Erreur lors de l'ajout");
    }
  };

  return (
    <form onSubmit={handleSubmit} className="p-4 flex flex-col gap-2">
      <input name="prenom" placeholder="Prénom" value={form.prenom} onChange={handleChange} />
      <input name="nom" placeholder="Nom" value={form.nom} onChange={handleChange} />
      <input name="sexe" placeholder="Sexe" value={form.sexe} onChange={handleChange} />
      <input name="adresse" placeholder="Adresse" value={form.adresse} onChange={handleChange} />
      <input name="ville" placeholder="Ville" value={form.ville} onChange={handleChange} />
      <input name="pays" placeholder="Pays" value={form.pays} onChange={handleChange} />
      <input name="telephone" placeholder="Téléphone" value={form.telephone} onChange={handleChange} />
      <input name="email" placeholder="Email" value={form.email} onChange={handleChange} />
      <button type="submit">Ajouter</button>
    </form>
  );
}
