
public class Obj_vote {
	public String id;
	public String subscribe_yt;
	public String member_group;
	public String number_post;
	public String updated;
	public String is_disabled;
	public Obj_vote(String id, String subscribe_yt, String member_group, String number_post, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.subscribe_yt = subscribe_yt;
		this.member_group = member_group;
		this.number_post = number_post;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_vote [id=" + id + ", subscribe_yt=" + subscribe_yt + ", member_group=" + member_group
				+ ", number_post=" + number_post + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
