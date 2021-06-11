
public class Obj_user_contribute {
	public String id;
	public String id_user;
	public String ranking;
	public String updated;
	public String is_disabled;
	public Obj_user_contribute(String id, String id_user, String ranking, String updated, String is_disabled) {
		super();
		this.id = id;
		this.id_user = id_user;
		this.ranking = ranking;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_user_contribute [id=" + id + ", id_user=" + id_user + ", ranking=" + ranking + ", updated="
				+ updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
